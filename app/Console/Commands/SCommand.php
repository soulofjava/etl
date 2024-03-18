<?php

namespace App\Console\Commands;

use App\Models\Asal\Config;
use App\Models\Asal\Sentitem;
use App\Models\Asal\SettingAplikasi;
use App\Models\Asal\Statistic;
use App\Models\Asal\SuratKeluar;
use App\Models\Asal\SuratMasuk;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Tujuan\Sentitem as TujuanSentitem;
use App\Models\Tujuan\Statistic as TujuanStatistic;
use App\Models\Tujuan\SuratKeluar as TujuanSuratKeluar;
use App\Models\Tujuan\SuratMasuk as TujuanSuratMasuk;
use Illuminate\Console\Command;

class SCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:s-command';

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

        $this->info('pindah table sentitems');
        $a = Sentitem::all();
        TujuanSentitem::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanSentitem::create($item->toArray());
        }

        $this->info('pindah table setting_aplikasi');
        $a = SettingAplikasi::all();
        SettingAplikasi::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            SettingAplikasi::create($item->toArray());
        }

        $this->info('pindah table statistics');
        $a = Statistic::all();
        TujuanStatistic::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanStatistic::create($item->toArray());
        }

        $this->info('pindah table surat_keluar');
        $a = SuratKeluar::all();
        TujuanSuratKeluar::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanSuratKeluar::create($item->toArray());
        }

        $this->info('pindah table surat_masuk');
        $a = SuratMasuk::all();
        TujuanSuratMasuk::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanSuratMasuk::create($item->toArray());
        }
    }
}
