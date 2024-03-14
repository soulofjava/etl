<?php

namespace App\Console\Commands;

use App\Models\Asal\Config;
use App\Models\Asal\RefAsalTanahKa;
use App\Models\Asal\RefDokuman;
use App\Models\Asal\RefJabatan;
use App\Models\Asal\RefPendudukBahasa;
use App\Models\Asal\RefPendudukBidang;
use App\Models\Asal\RefPendudukHamil;
use App\Models\Asal\RefPendudukKursu;
use App\Models\Asal\RefPendudukSuku;
use App\Models\Asal\RefPeristiwa;
use App\Models\Asal\RefPersilKela;
use App\Models\Asal\RefPersilMutasi;
use App\Models\Asal\RefPeruntukanTanahKa;
use App\Models\Asal\RefPindah;
use App\Models\Asal\RefStatusCovid;
use App\Models\Asal\RefSyaratSurat;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Tujuan\RefAsalTanahKa as TujuanRefAsalTanahKa;
use App\Models\Tujuan\RefDokuman as TujuanRefDokuman;
use App\Models\Tujuan\RefJabatan as TujuanRefJabatan;
use App\Models\Tujuan\RefPendudukBahasa as TujuanRefPendudukBahasa;
use App\Models\Tujuan\RefPendudukBidang as TujuanRefPendudukBidang;
use App\Models\Tujuan\RefPendudukHamil as TujuanRefPendudukHamil;
use App\Models\Tujuan\RefPendudukKursu as TujuanRefPendudukKursu;
use App\Models\Tujuan\RefPendudukSuku as TujuanRefPendudukSuku;
use App\Models\Tujuan\RefPeristiwa as TujuanRefPeristiwa;
use App\Models\Tujuan\RefPersilKela as TujuanRefPersilKela;
use App\Models\Tujuan\RefPersilMutasi as TujuanRefPersilMutasi;
use App\Models\Tujuan\RefPeruntukanTanahKa as TujuanRefPeruntukanTanahKa;
use App\Models\Tujuan\RefPindah as TujuanRefPindah;
use App\Models\Tujuan\RefStatusCovid as TujuanRefStatusCovid;
use App\Models\Tujuan\RefSyaratSurat as TujuanRefSyaratSurat;
use Illuminate\Console\Command;

class RCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:r-command';

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

        $this->info('pindah table ref_jabatan');
        $a = RefJabatan::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanRefJabatan::create($item->toArray());
        }

        $this->info('pindah table ref_syarat_surat');
        $a = RefSyaratSurat::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanRefSyaratSurat::create($item->toArray());
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table ref_asal_tanah_kas');
        $a = RefAsalTanahKa::all();
        foreach ($a as $item) {
            $b = TujuanRefAsalTanahKa::find($item->id);
            if (!$b) {
                TujuanRefAsalTanahKa::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table ref_dokumen');
        $a = RefDokuman::all();
        foreach ($a as $item) {
            $b = TujuanRefDokuman::find($item->id);
            if (!$b) {
                TujuanRefDokuman::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table ref_penduduk_bahasa');
        $a = RefPendudukBahasa::all();
        foreach ($a as $item) {
            $b = TujuanRefPendudukBahasa::find($item->id);
            if (!$b) {
                TujuanRefPendudukBahasa::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table ref_penduduk_bidang');
        $a = RefPendudukBidang::all();
        foreach ($a as $item) {
            $b = TujuanRefPendudukBidang::find($item->id);
            if (!$b) {
                TujuanRefPendudukBidang::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table ref_penduduk_hamil');
        $a = RefPendudukHamil::all();
        foreach ($a as $item) {
            $b = TujuanRefPendudukHamil::find($item->id);
            if (!$b) {
                TujuanRefPendudukHamil::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table ref_penduduk_kursus');
        $a = RefPendudukKursu::all();
        foreach ($a as $item) {
            $b = TujuanRefPendudukKursu::find($item->id);
            if (!$b) {
                TujuanRefPendudukKursu::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table ref_penduduk_suku');
        $a = RefPendudukSuku::all();
        foreach ($a as $item) {
            $b = TujuanRefPendudukSuku::find($item->id);
            if (!$b) {
                TujuanRefPendudukSuku::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table ref_peristiwa');
        $a = RefPeristiwa::all();
        foreach ($a as $item) {
            $b = TujuanRefPeristiwa::find($item->id);
            if (!$b) {
                TujuanRefPeristiwa::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table ref_persil_kelas');
        $a = RefPersilKela::all();
        foreach ($a as $item) {
            $b = TujuanRefPersilKela::find($item->id);
            if (!$b) {
                TujuanRefPersilKela::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table ref_persil_mutasi');
        $a = RefPersilMutasi::all();
        foreach ($a as $item) {
            $b = TujuanRefPersilMutasi::find($item->id);
            if (!$b) {
                TujuanRefPersilMutasi::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table ref_peruntukan_tanah_kas');
        $a = RefPeruntukanTanahKa::all();
        foreach ($a as $item) {
            $b = TujuanRefPeruntukanTanahKa::find($item->id);
            if (!$b) {
                TujuanRefPeruntukanTanahKa::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table ref_pindah');
        $a = RefPindah::all();
        foreach ($a as $item) {
            $b = TujuanRefPindah::find($item->id);
            if (!$b) {
                TujuanRefPindah::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table ref_status_covid');
        $a = RefStatusCovid::all();
        foreach ($a as $item) {
            $b = TujuanRefStatusCovid::find($item->id);
            if (!$b) {
                TujuanRefStatusCovid::create($item->toArray());
            }
        }
    }
}
