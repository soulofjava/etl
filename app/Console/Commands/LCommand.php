<?php

namespace App\Console\Commands;

use App\Models\Asal\Config;
use App\Models\Asal\LaporanSinkronisasi;
use App\Models\Asal\Line;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Tujuan\LaporanSinkronisasi as TujuanLaporanSinkronisasi;
use App\Models\Tujuan\Line as TujuanLine;
use Illuminate\Console\Command;

class LCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:l-command';

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

        $this->info('pindah table laporan_sinkronisasi');
        $a = LaporanSinkronisasi::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanLaporanSinkronisasi::create($item->toArray());
        }

        $this->info('pindah table line');
        $a = Line::all();
        $b = "";
        foreach ($a as $item) {
            $b = TujuanLine::create($item->toArray());
        }
    }
}
