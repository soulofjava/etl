<?php

namespace App\Console\Commands;

use App\Models\Asal\Config as AsalConfig;
use App\Models\Asal\TwebSuratFormat;
use App\Models\Asal\TwebWilClusterdesa;
use App\Models\Asal\User;
use App\Models\Asal\UserGrup;
use App\Models\Asal\Widget;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Tujuan\TwebSuratFormat as TujuanTwebSuratFormat;
use App\Models\Tujuan\TwebWilClusterdesa as TujuanTwebWilClusterdesa;
use App\Models\Tujuan\User as TujuanUser;
use App\Models\Tujuan\UserGrup as TujuanUserGrup;
use App\Models\Tujuan\Widget as TujuanWidget;
use Illuminate\Console\Command;

class CobaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cholis';

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
        $config = AsalConfig::all();
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

        $this->info('pindah table widget');
        $a = Widget::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanWidget::where('config_id', $setConfigId)->first();
            if (!$cek) {
                TujuanWidget::create($item->toArray());
            }
        }

        $this->info('pindah table user_grup');
        $a = UserGrup::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanUserGrup::where('config_id', $setConfigId)->first();
            if (!$cek) {
                TujuanUserGrup::create($item->toArray());
            }
        }

        $this->info('pindah table user');
        $a = User::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanUser::where('config_id', $setConfigId)->first();
            if (!$cek) {
                TujuanUser::create($item->toArray());
            }
        }

        $this->info('pindah table tweb_wil_clusterdesa');
        $a = TwebWilClusterdesa::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanTwebWilClusterdesa::where('config_id', $setConfigId)->first();
            if (!$cek) {
                TujuanTwebWilClusterdesa::create($item->toArray());
            }
        }

        $this->info('pindah table tweb_surat_format');
        $a = TwebSuratFormat::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanTwebSuratFormat::where('config_id', $setConfigId)->first();
            if (!$cek) {
                TujuanTwebSuratFormat::create($item->toArray());
            }
        }
    }
}
