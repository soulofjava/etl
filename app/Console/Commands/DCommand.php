<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asal\Config;
use App\Models\Asal\DisposisiSuratMasuk;
use App\Models\Asal\Dokuman;
use App\Models\Asal\DokumenHidup;
use App\Models\Asal\Dtk;
use App\Models\Asal\DtksAnggotum;
use App\Models\Asal\DtksLampiran;
use App\Models\Asal\DtksPengaturanProgram;
use App\Models\Asal\SuratMasuk;
use App\Models\Asal\TwebDesaPamong;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Tujuan\DisposisiSuratMasuk as TujuanDisposisiSuratMasuk;
use App\Models\Tujuan\Dokuman as TujuanDokuman;
use App\Models\Tujuan\DokumenHidup as TujuanDokumenHidup;
use App\Models\Tujuan\Dtk as TujuanDtk;
use App\Models\Tujuan\DtksAnggotum as TujuanDtksAnggotum;
use App\Models\Tujuan\DtksLampiran as TujuanDtksLampiran;
use App\Models\Tujuan\DtksPengaturanProgram as TujuanDtksPengaturanProgram;
use App\Models\Tujuan\SuratMasuk as TujuanSuratMasuk;
use App\Models\Tujuan\TwebDesaPamong as TujuanTwebDesaPamong;

class DCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:d-command';

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

        $this->info('pindah table DisposisiSuratMasuk');
        $a = DisposisiSuratMasuk::all();
        TujuanDisposisiSuratMasuk::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $id_surat_masuk = SuratMasuk::where('id', $item->id_surat_masuk)->first();
            $d_id_surat_masuk = TujuanSuratMasuk::where('nomor_surat', $id_surat_masuk->nomor_surat)->where('pengirim', $id_surat_masuk->pengirim)->first();
            $id_desa_pamong = TwebDesaPamong::where('pamong_id', $item->id_desa_pamong)->first();
            $d_id_desa_pamong = TujuanTwebDesaPamong::where('pamong_nik', $id_desa_pamong->pamong_nik)->first();
            $item->id_surat_masuk = $d_id_surat_masuk->id;
            $item->id_desa_pamong = $d_id_desa_pamong->id;
            TujuanDisposisiSuratMasuk::create($item->toArray());
        }
        $this->info('pindah table Dokuman');
        $a = Dokuman::all();
        TujuanDokuman::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanDokuman::create($item->toArray());
        }

        // $this->info('pindah table Dtk');
        // $a = Dtk::all();
        // TujuanDtk::where('config_id', $setConfigId)->delete();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     TujuanDtk::create($item->toArray());
        // }
        // $this->info('pindah table DtksAnggotum');
        // $a = DtksAnggotum::all();
        // TujuanDtksAnggotum::where('config_id', $setConfigId)->delete();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     TujuanDtksAnggotum::create($item->toArray());
        // }
        $this->info('pindah table DtksLampiran');
        $a = DtksLampiran::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            if ($item->id_rtm == null) {
                TujuanDtksLampiran::create($item->toArray());
            }
        }
        $this->info('pindah table DtksPengaturanProgram');
        $a = DtksPengaturanProgram::all();
        TujuanDtksPengaturanProgram::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanDtksPengaturanProgram::create($item->toArray());
        }
    }
}
