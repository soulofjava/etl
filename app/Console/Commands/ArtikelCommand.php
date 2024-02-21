<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asal\Config;
use App\Models\Tujuan\Config as TujuanConfig;
use Illuminate\Support\Arr;
use App\Models\Asal\Artikel as AsalArtikel;
use App\Models\Tujuan\Agenda as TujuanAgenda;
use App\Models\Tujuan\Artikel as TujuanArtikel;
use App\Models\Tujuan\Kategori as TujuanKategori;
use Illuminate\Support\Facades\DB;

class ArtikelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:artikel-command';

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
            TujuanAgenda::where('config_id', $setConfigId)->delete();
            TujuanArtikel::where('config_id', $setConfigId)->delete();
            TujuanKategori::where('config_id', $setConfigId)->delete();

            $data = AsalArtikel::with('agendas')->get();

            // $this->info($data);
            foreach ($data as $asal) {
                $asalnya = Arr::except($asal->toArray(), ['id']);
                $asalnya['config_id'] =   $setConfigId;
                $a = TujuanArtikel::create($asalnya);
                $this->info('pindah data artikel');
                foreach ($asal->agendas ?? [] as $agenda) {
                    $isiagenda =  Arr::except($agenda->toArray(), ['id']);
                    $isiagenda['config_id'] =   $setConfigId;
                    $a->agendas()->create($isiagenda);
                    $this->info('pindah data agenda');
                }
            }
        });
    }
}
