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
use App\Models\Asal\AnalisisRefState;
use App\Models\Tujuan\AnalisisRefState as TujuanAnalisisRefState;
use App\Models\Asal\AnalisisRefSubjek;
use App\Models\Tujuan\AnalisisRefSubjek as TujuanAnalisisRefSubjek;
use App\Models\Asal\AnalisisRespon;
use App\Models\Asal\AnalisisResponBukti;
use App\Models\Asal\AnalisisResponHasil;
use App\Models\Asal\AnalisisTipeIndikator;
use App\Models\Asal\AnggotaGrupKontak;
use App\Models\Asal\Anjungan;
use App\Models\Asal\AnjunganMenu;
use App\Models\Asal\Area;
use App\Models\Asal\Artikel;
use App\Models\Tujuan\AnalisisRespon as TujuanAnalisisRespon;
use App\Models\Tujuan\AnalisisResponBukti as TujuanAnalisisResponBukti;
use App\Models\Tujuan\AnalisisResponHasil as TujuanAnalisisResponHasil;
use App\Models\Tujuan\AnalisisTipeIndikator as TujuanAnalisisTipeIndikator;
use App\Models\Tujuan\AnggotaGrupKontak as TujuanAnggotaGrupKontak;
use App\Models\Tujuan\Anjungan as TujuanAnjungan;
use App\Models\Tujuan\AnjunganMenu as TujuanAnjunganMenu;
use App\Models\Tujuan\Area as TujuanArea;
use App\Models\Tujuan\Artikel as TujuanArtikel;


class ACommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:a-command';

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

        echo 'pindah table config ';
        $config = Config::all();
        foreach ($config as $item) {
            // $item->config_id = $setConfigId;
            //cek dulu config nya
            $cek = TujuanConfig::where('app_key', $item->app_key)->first();

            echo "$item->app_ke";
            if (!$cek) {

                echo 'app tidak ditemukan ';
                $a = TujuanConfig::create($item->toArray());
                $setConfigId = $a->id;
            } else {

                echo 'app key ditemukan ';
                $setConfigId = $cek->id;
            }
        }

        echo 'pindah table AnalisisIndikator ';
        $a = AnalisisIndikator::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisIndikator::where('config_id', $setConfigId)->where('id_master', $item->id_master)->first();

            if (!$cek) {
                // Create a new record in the destination table
                TujuanAnalisisIndikator::create($item->toArray());
            }
        }

        echo 'pindah table AnalisisKategoriIndikator ';
        $a = AnalisisKategoriIndikator::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisKategoriIndikator::where('config_id', $setConfigId)->where('id_master', $item->id_master)->first();
            if (!$cek) {
                TujuanAnalisisKategoriIndikator::create($item->toArray());
            }
        }

        echo 'pindah table AnalisisKlasifikasi ';
        $a = AnalisisKlasifikasi::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisKlasifikasi::where('config_id', $setConfigId)->where('id_master', $item->id_master)->first();
            if (!$cek) {
                TujuanAnalisisKlasifikasi::create($item->toArray());
            }
        }

        echo 'pindah table AnalisisMaster ';
        $a = AnalisisMaster::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisMaster::where('config_id', $setConfigId)->where('subjek_tipe', $item->subjek_tipe)->first();
            if (!$cek) {
                TujuanAnalisisMaster::create($item->toArray());
            }
        }

        echo 'pindah table AnalisisParameter ';
        $a = AnalisisParameter::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisParameter::where('config_id', $setConfigId)->where('kode_jawaban', $item->kode_jawaban)->first();
            if (!$cek) {
                $id_indikator = AnalisisIndikator::where('id', $item->id_indikator)->first();
                $c = TujuanAnalisisIndikator::where('config_id', $setConfigId)->where('pertanyaan', $id_indikator->pertanyaan)->first();
                $item->id_indikator = $c->id;
                TujuanAnalisisParameter::create($item->toArray());
            }
        }

        echo 'pindah table AnalisisPartisipasi';
        $a = AnalisisPartisipasi::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisPartisipasi::where('config_id', $setConfigId)->where('id_master', $item->id_master)->first();
            if (!$cek) {
                TujuanAnalisisPartisipasi::create($item->toArray());
            }
        }

        echo 'pindah table AnalisisPeriode';
        $a = AnalisisPeriode::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisPeriode::where('config_id', $setConfigId)->where('id_master', $item->id_master)->first();
            if (!$cek) {
                TujuanAnalisisPeriode::create($item->toArray());
            }
        }

        echo 'pindah table AnalisisRespon';
        $a = AnalisisRespon::all();
        TujuanAnalisisRespon::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanAnalisisRespon::create($item->toArray());
        }

        echo 'pindah table AnalisisResponBukti';
        $a = AnalisisResponBukti::all();
        TujuanAnalisisResponBukti::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanAnalisisResponBukti::create($item->toArray());
        }

        echo 'pindah table AnalisisResponHasil';
        $a = AnalisisResponHasil::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanAnalisisResponHasil::create($item->toArray());
        }

        echo 'pindah table AnggotaGrupKontak';
        $a = AnggotaGrupKontak::all();
        TujuanAnggotaGrupKontak::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanAnggotaGrupKontak::create($item->toArray());
        }

        echo 'pindah table Anjungan';
        $a = Anjungan::all();
        TujuanAnjungan::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanAnjungan::create($item->toArray());
        }

        echo 'pindah table AnjunganMenu ';
        $a = AnjunganMenu::all();
        TujuanAnjunganMenu::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanAnjunganMenu::create($item->toArray());
        }

        echo 'pindah table Area ';
        $a = Area::all();
        TujuanArea::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanArea::create($item->toArray());
        }
    }
}
