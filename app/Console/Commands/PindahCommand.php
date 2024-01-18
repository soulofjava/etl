<?php

namespace App\Console\Commands;

use App\Models\Asal\Agenda;
use App\Models\Asal\Config;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Asal\Kategori;
use App\Models\Tujuan\Kategori as TujuanKategori;
use Illuminate\Console\Command;
use App\Models\Asal\Artikel;
use App\Models\Tujuan\Agenda as TujuanAgenda;
use App\Models\Tujuan\Artikel as TujuanArtikel;

class PindahCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gawean:asu';

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

        $this->info('pindah table kategori');
        $a = Kategori::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanKategori::where('config_id', $setConfigId)->where('kategori', $item->kategori)->first();
            if ($cek) {
                TujuanKategori::create($item->toArray());
            }
        }
        $this->info('pindah table artikel');
        $a = Artikel::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            //cek 
            $cek = TujuanArtikel::where('config_id', $setConfigId)->where('slug', $item->slug)->first();
            if (!$cek) {
                TujuanArtikel::create($item->toArray());
            }
        }
        $this->info('pindah table agenda');
        $a = Agenda::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAgenda::where('config_id', $setConfigId)->where('id_artikel', $item->id_artikel)->first();
            if (!$cek) {
                TujuanAgenda::create($item->toArray());
            }
        }
    }
}
