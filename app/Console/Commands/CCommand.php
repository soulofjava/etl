<?php

namespace App\Console\Commands;

use App\Models\Asal\CaptchaCode;
use App\Models\Asal\Cdesa;
use Illuminate\Console\Command;
use App\Models\Asal\Config;
use App\Models\Tujuan\CaptchaCode as TujuanCaptchaCode;
use App\Models\Tujuan\Cdesa as TujuanCdesa;
use App\Models\Asal\CdesaPenduduk;
use App\Models\Asal\Covid19Pantau;
use App\Models\Asal\Covid19Pemudik;
use App\Models\Asal\Covid19Vaksin;
use App\Models\Tujuan\CdesaPenduduk as TujuanCdesaPenduduk;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Tujuan\Covid19Pantau as TujuanCovid19Pantau;
use App\Models\Tujuan\Covid19Pemudik as TujuanCovid19Pemudik;
use App\Models\Tujuan\Covid19Vaksin as TujuanCovid19Vaksin;

class CCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:c-command';

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

        // $this->info('pindah table CaptchaCode');
        // $a = CaptchaCode::all();
        // TujuanCaptchaCode::where('config_id', $setConfigId)->delete();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     TujuanCaptchaCode::create($item->toArray());
        // }

        $this->info('pindah table Cdesa');
        $a = Cdesa::all();
        TujuanCdesa::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanCdesa::create($item->toArray());
        }
        $this->info('pindah table CdesaPenduduk');
        $a = CdesaPenduduk::all();
        TujuanCdesaPenduduk::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanCdesaPenduduk::create($item->toArray());
        }

        $this->info('pindah table Covid19Pantau');
        $a = Covid19Pantau::all();
        TujuanCovid19Pantau::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanCovid19Pantau::create($item->toArray());
        }
        $this->info('pindah table Covid19Pemudik');
        $a = Covid19Pemudik::all();
        TujuanCovid19Pemudik::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanCovid19Pemudik::create($item->toArray());
        }
        $this->info('pindah table Covid19Vaksin');
        $a = Covid19Vaksin::all();
        TujuanCovid19Vaksin::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanCovid19Vaksin::create($item->toArray());
        }
    }
}
