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


class MoveCommand extends Command
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
        $this->info('pindah table AnalisisRefState');
        $a = AnalisisRefState::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisRefState::where('id', $item->id)->first();
            if (!$cek) {
                TujuanAnalisisRefState::create($item->toArray());
            }
        }
        $this->info('pindah table AnalisisRefSubjek');
        $a = AnalisisRefSubjek::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisRefSubjek::where('id', $item->id)->first();
            if (!$cek) {
                TujuanAnalisisRefSubjek::create($item->toArray());
            }
        }
        $this->info('pindah table AnalisisRespon');
        $a = AnalisisRespon::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisRespon::where('config_id', $setConfigId)->first();
            //masih ambigu mau berpatokan dari id apa ?
            if (!$cek) {
                TujuanAnalisisRespon::create($item->toArray());
            }
        }
        $this->info('pindah table AnalisisResponBukti');
        $a = AnalisisResponBukti::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisResponBukti::where('config_id', $setConfigId)->first();
            //masih ambigu mau berpatokan dari id apa ?
            if (!$cek) {
                TujuanAnalisisResponBukti::create($item->toArray());
            }
        }
        $this->info('pindah table AnalisisResponHasil');
        $a = AnalisisResponHasil::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisResponHasil::where('config_id', $setConfigId)->first();
            //masih ambigu mau berpatokan dari id apa ?
            if (!$cek) {
                TujuanAnalisisResponHasil::create($item->toArray());
            }
        }
        $this->info('pindah table AnalisisTipeIndikator');
        $a = AnalisisTipeIndikator::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnalisisTipeIndikator::where('id', $item->id)->first();
            if (!$cek) {
                TujuanAnalisisTipeIndikator::create($item->toArray());
            }
        }
        $this->info('pindah table AnggotaGrupKontak');
        $a = AnggotaGrupKontak::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnggotaGrupKontak::where('config_id', $setConfigId)->first();
            //masih ambigu mau berpatokan dari id apa ?
            if (!$cek) {
                TujuanAnggotaGrupKontak::create($item->toArray());
            }
        }
        $this->info('pindah table Anjungan');
        $a = Anjungan::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnjungan::where('config_id', $setConfigId)->where('created_at', $item->crated_at)->first();
            if (!$cek) {
                TujuanAnjungan::create($item->toArray());
            }
        }
        $this->info('pindah table AnjunganMenu');
        $a = AnjunganMenu::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanAnjunganMenu::where('config_id', $setConfigId)->where('urut', $item->urut)->first();
            if (!$cek) {
                TujuanAnjunganMenu::create($item->toArray());
            }
        }
        $this->info('pindah table Area');
        $a = Area::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanArea::where('config_id', $setConfigId)->where('id_cluster', $item->id_cluster)->first();
            if (!$cek) {
                TujuanArea::create($item->toArray());
            }
        }
        $this->info('pindah table Artikel');
        $a = Artikel::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanArtikel::where('config_id', $setConfigId)->where('slug', $item->slug)->first();
            if (!$cek) {
                TujuanArtikel::create($item->toArray());
            }
        }
    }
}
