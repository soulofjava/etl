<?php

namespace App\Console\Commands;

use App\Models\Asal\Config;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Asal\BukuKeperluan;
use App\Models\Asal\BukuKepuasan;
use App\Models\Asal\BukuPertanyaan;
use App\Models\Asal\BukuTamu;
use App\Models\Asal\BulananAnak;
use App\Models\Tujuan\BukuKeperluan as TujuanBukuKeperluan;
use App\Models\Tujuan\BukuKepuasan as TujuanBukuKepuasan;
use App\Models\Tujuan\BukuPertanyaan as TujuanBukuPertanyaan;
use App\Models\Tujuan\BukuTamu as TujuanBukuTamu;
use App\Models\Tujuan\BulananAnak as TujuanBulananAnak;
use Illuminate\Console\Command;

class BCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:b-command';

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
        $this->info('pindah table BukuKeperluan');
        $a = BukuKeperluan::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanBukuKeperluan::where('config_id', $setConfigId)->where('created_at', $item->slug)->first();
            if (!$cek) {
                TujuanBukuKeperluan::create($item->toArray());
            }
        }
        $this->info('pindah table BukuKepuasan');
        $a = BukuKepuasan::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanBukuKepuasan::where('config_id', $setConfigId)->where('created_at', $item->slug)->first();
            if (!$cek) {
                TujuanBukuKepuasan::create($item->toArray());
            }
        }
        $this->info('pindah table BukuPertanyaan');
        $a = BukuPertanyaan::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanBukuPertanyaan::where('config_id', $setConfigId)->where('created_at', $item->slug)->first();
            if (!$cek) {
                TujuanBukuPertanyaan::create($item->toArray());
            }
        }
        $this->info('pindah table BukuTamu');
        $a = BukuTamu::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanBukuTamu::where('config_id', $setConfigId)->where('created_at', $item->slug)->first();
            if (!$cek) {
                TujuanBukuTamu::create($item->toArray());
            }
        }
        $this->info('pindah table BulananAnak');
        $a = BulananAnak::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanBulananAnak::where('config_id', $setConfigId)->where('kia_id', $item->slug)->first();
            if (!$cek) {
                TujuanBulananAnak::create($item->toArray());
            }
        }
    }
}
