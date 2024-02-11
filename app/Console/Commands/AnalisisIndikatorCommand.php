<?php

namespace App\Console\Commands;

use App\Models\Asal\AnalisisIndikator;
use App\Models\Tujuan\AnalisisIndikator as TujuanAnalisisIndikator;
use Illuminate\Console\Command;
use App\Models\Asal\Config;
use App\Models\Tujuan\Config as TujuanConfig;


class TriCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:tri-command';

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
            if ($cek) {
                TujuanAnalisisIndikator::create($item->toArray());
            }
            if (!$cek) {
                // Create a new record in the destination table
                TujuanAnalisisIndikator::create($item->toArray());
            }
        }
        
    }
}
