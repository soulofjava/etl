<?php

namespace App\Console\Commands;

use App\Models\Asal\Config;
use App\Models\Asal\TanahDesa;
use App\Models\Asal\TanahKasDesa;
use App\Models\Asal\TeksBerjalan;
use App\Models\Asal\TwebPendudukUmur;
use App\Models\Asal\TwebRtm;
use App\Models\Asal\TwebSuratFormat;
use App\Models\Asal\TwebWilClusterdesa;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Tujuan\TanahDesa as TujuanTanahDesa;
use App\Models\Tujuan\TanahKasDesa as TujuanTanahKasDesa;
use App\Models\Tujuan\TeksBerjalan as TujuanTeksBerjalan;
use App\Models\Tujuan\TwebPendudukUmur as TujuanTwebPendudukUmur;
use App\Models\Tujuan\TwebRtm as TujuanTwebRtm;
use App\Models\Tujuan\TwebSuratFormat as TujuanTwebSuratFormat;
use App\Models\Tujuan\TwebWilClusterdesa as TujuanTwebWilClusterdesa;
use Illuminate\Console\Command;

class TCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:t-command';

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

        $this->info('pindah table tanah_desa');
        $a = TanahDesa::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanTanahDesa::create($item->toArray());
        }

        $this->info('pindah table tanah_kas_desa');
        $a = TanahKasDesa::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanTanahKasDesa::create($item->toArray());
        }

        $this->info('pindah table teks_berjalan');
        $a = TeksBerjalan::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanTeksBerjalan::create($item->toArray());
        }

        $this->info('pindah table tweb_penduduk_umur');
        $a = TwebPendudukUmur::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanTwebPendudukUmur::create($item->toArray());
        }

        $this->info('pindah table tweb_rtm');
        $a = TwebRtm::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanTwebRtm::create($item->toArray());
        }

        $this->info('pindah table tweb_surat_format');
        $a = TwebSuratFormat::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanTwebSuratFormat::create($item->toArray());
        }

        $this->info('pindah table tweb_wil_clusterdesa');
        $a = TwebWilClusterdesa::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanTwebWilClusterdesa::create($item->toArray());
        }
    }
}
