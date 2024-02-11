<?php

namespace App\Console\Commands;

use App\Models\Asal\Config;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Asal\BukuKeperluan;
use App\Models\Tujuan\BukuKeperluan as TujuanBukuKeperluan;
use Illuminate\Console\Command;

class BCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:b-command';

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
        $this->info('pindah table BukuKeperluan');
        $a = BukuKeperluan::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanBukuKeperluan::where('config_id', $setConfigId)->where('created_at', $item->slug)->first();
            if (!$cek) {
                TujuanBukuKeperluan::create($item->toArray());
            }
        }
    }
}
