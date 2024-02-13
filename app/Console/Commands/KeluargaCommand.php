<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asal\TwebKeluarga as AsalKeluarga;
use App\Models\Tujuan\TwebKeluarga as TujuanKeluarga;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Asal\Config;

class KeluargaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:keluarga-command';

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

        $data = AsalKeluarga::with(['penduduk'])->get();
        foreach ($data as $asal) {
            $asal = $asal->toArray()->except(['id']);
            $asal['config_id'] =   $setConfigId;
            $a = TujuanKeluarga::create($asal);
            foreach ($asal->penduduk as $penduduk) {
            }
        }
    }
}