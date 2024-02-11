<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asal\Config;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Asal\AnalisisIndikator;
use App\Models\Tujuan\AnalisisIndikator as TujuanAnalisisIndikator;
use App\Models\Asal\AnalisisKategoriIndikator;
use App\Models\Tujuan\AnalisisKategoriIndikator as TujuanAnalisisKategoriIndikator;
use App\Models\Asal\AnalisisKlasifikasi;
use App\Models\Tujuan\AnalisisKlasifikasi as TujuanAnalisisKlasifikasi;
use App\Models\Asal\AnalisisMaster;
use App\Models\Tujuan\AnalisisMaster as TujuanAnalisisMaster;
use App\Models\Asal\AnalisisParameter;
use App\Models\Tujuan\AnalisisParameter as TujuanAnalisisParameter;
use App\Models\Asal\AnalisisPartisipasi;
use App\Models\Tujuan\AnalisisPartisipasi as TujuanAnalisisPartisipasi;
use App\Models\Asal\AnalisisPeriode;
use App\Models\Tujuan\AnalisisPeriode as TujuanAnalisisPeriode;

class MoveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:move-command';

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

        $this->info('pindah table AnalisisIndikator');
        $a = AnalisisIndikator::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisIndikator::where('config_id', $setConfigId)->where('id_master', $item->id_master)->first();

            if (!$cek) {
                // Create a new record in the destination table
                TujuanAnalisisIndikator::create($item->toArray());
            }
        }

        $this->info('pindah table AnalisisKategoriIndikator');
        $a = AnalisisKategoriIndikator::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisKategoriIndikator::where('config_id', $setConfigId)->where('id_master', $item->id_master)->first();
            if (!$cek) {
                TujuanAnalisisKategoriIndikator::create($item->toArray());
            }
        }
        $this->info('pindah table AnalisisKlasifikasi');
        $a = AnalisisKlasifikasi::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisKlasifikasi::where('config_id', $setConfigId)->where('id_master', $item->id_master)->first();
            if (!$cek) {
                TujuanAnalisisKlasifikasi::create($item->toArray());
            }
        }
        $this->info('pindah table AnalisisMaster');
        $a = AnalisisMaster::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisMaster::where('config_id', $setConfigId)->where('subjek_tipe', $item->subjek_tipe)->first();
            if (!$cek) {
                TujuanAnalisisMaster::create($item->toArray());
            }
        }
        $this->info('pindah table AnalisisParameter');
        $a = AnalisisParameter::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisParameter::where('config_id', $setConfigId)->where('kode_jawaban', $item->kode_jawaban)->first();
            if (!$cek) {
                TujuanAnalisisParameter::create($item->toArray());
            }
        }
        $this->info('pindah table AnalisisPartisipasi');
        $a = AnalisisPartisipasi::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisPartisipasi::where('config_id', $setConfigId)->where('id_master', $item->id_master)->first();
            if (!$cek) {
                TujuanAnalisisPartisipasi::create($item->toArray());
            }
        }
        $this->info('pindah table AnalisisPeriode');
        $a = AnalisisPeriode::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisPeriode::where('config_id', $setConfigId)->where('id_master', $item->id_master)->first();
            if (!$cek) {
                TujuanAnalisisPeriode::create($item->toArray());
            }
        }
    }
}
