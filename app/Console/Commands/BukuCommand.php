<?php

namespace App\Console\Commands;

use App\Models\Asal\BukuTamu as AsalBukuTamu;
use App\Models\Asal\BukuKepuasan as AsalBukuKepuasan;
use App\Models\Asal\BukuPertanyaan as AsalBukuPertanyaan;
use App\Models\Asal\BukuKeperluan as AsalBukuKeperluan;
use App\Models\Tujuan\BukuTamu as TujuanBukuTamu;
use App\Models\Tujuan\BukuKeperluan as TujuanBukuKeperluan;
use App\Models\Tujuan\BukuKepuasan as TujuanBukuKepuasan;
use App\Models\Tujuan\BukuPertanyaan as TujuanBukuPertanyaan;
use Illuminate\Console\Command;
use App\Models\Asal\Config;
use App\Models\Tujuan\Config as TujuanConfig;
use DB;
use Illuminate\Support\Arr;

class BukuCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:buku-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::transaction(function () {
            $setConfigId = '';
            $this->info('pindah table config');
            $config = Config::all();
            foreach ($config as $item) {
                // $item->config_id = $setConfigId;
                //cek dulu config nya
                $cek = TujuanConfig::where('app_key', $item->app_key)->first();
                $this->info($item->app_key);
                if (!$cek) {
                    $this->info('app tidak ditemukan');
                    $a = TujuanConfig::create($item->toArray());
                    $setConfigId = $a->id;
                } else {
                    $this->info('app key ditemukan');
                    $setConfigId = $cek->id;
                }
            }
            $this->info('memulai pemindahan data ...');
            TujuanBukuTamu::where('config_id', $setConfigId)->delete();
            TujuanBukuKepuasan::where('config_id', $setConfigId)->delete();
            TujuanBukuKeperluan::where('config_id', $setConfigId)->delete();
            TujuanBukuPertanyaan::where('config_id', $setConfigId)->delete();

            $bukuKeperluan = AsalBukuKeperluan::get();
            foreach ($bukuKeperluan as $asalBukuKeperluan) {
                $isianBukuKeperluan =  Arr::except($asalBukuKeperluan->toArray(), ['id']);
                TujuanBukuKeperluan::create($isianBukuKeperluan);
            }
            $bukuTamu = AsalBukuTamu::with(['bukuKepuasan'])->get();
            $bukuPertanyaan = AsalBukuPertanyaan::get();
            foreach ($bukuPertanyaan as $asalbukuPertanyaan) {
                $isianbukuPertanyaan = $asalbukuPertanyaan->toArray();
                $isianbukuPertanyaan['config_id'] = $setConfigId;
                $hasilBukukuPertanyaan = TujuanBukuPertanyaan::create($isianbukuPertanyaan);
            }
            foreach ($bukuTamu as $asalBukuTamu) {
                $isianbukuTamu = $asalBukuTamu->toArray();
                $isianbukuTamu['config_id'] = $setConfigId;
                $hasilbukuTamu = TujuanBukuTamu::create($isianbukuTamu);
                foreach ($asalBukuTamu->bukuKepuasan as $asalBukuKepuasan) {
                    $isianBukuKepuasan =  Arr::except($asalBukuKepuasan->toArray(), ['id', 'id_nama', 'id_pertanyaan']);
                    $isianBukuKepuasan['id_nama'] = $hasilbukuTamu->id;
                    $isianBukuKepuasan['id_pertanyaan'] = $hasilBukukuPertanyaan->id;
                    $isianbukuKepuasan['config_id'] = $setConfigId;
                    $hasilbukuTamu->bukuKepuasan()->create($isianBukuKepuasan);
                }
            }
            $this->info('pemindahan data selesai...');
        });
    }
}
