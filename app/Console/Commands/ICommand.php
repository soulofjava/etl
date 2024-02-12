<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asal\Config;
use App\Models\Asal\IbuHamil;
use App\Models\Asal\Inbox;
use App\Models\Asal\InventarisAsset;
use App\Models\Asal\InventarisGedung;
use App\Models\Asal\InventarisJalan;
use App\Models\Asal\InventarisKontruksi;
use App\Models\Asal\InventarisPeralatan;
use App\Models\Asal\InventarisTanah;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Tujuan\IbuHamil as TujuanIbuHamil;
use App\Models\Tujuan\Inbox as TujuanInbox;
use App\Models\Tujuan\InventarisAsset as TujuanInventarisAsset;
use App\Models\Tujuan\InventarisGedung as TujuanInventarisGedung;
use App\Models\Tujuan\InventarisJalan as TujuanInventarisJalan;
use App\Models\Tujuan\InventarisKontruksi as TujuanInventarisKontruksi;
use App\Models\Tujuan\InventarisPeralatan as TujuanInventarisPeralatan;
use App\Models\Tujuan\InventarisTanah as TujuanInventarisTanah;

class ICommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:i-command';

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
        $this->info('pindah table IbuHamil');
        $a = IbuHamil::all();
        TujuanIbuHamil::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanIbuHamil::create($item->toArray());
        }
        $this->info('pindah table Inbox');
        $a = Inbox::all();
        TujuanInbox::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanInbox::create($item->toArray());
        }
        $this->info('pindah table InventarisAsset');
        $a = InventarisAsset::all();
        TujuanInventarisAsset::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanInventarisAsset::create($item->toArray());
        }
        $this->info('pindah table InventarisGedung');
        $a = InventarisGedung::all();
        TujuanInventarisGedung::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanInventarisGedung::create($item->toArray());
        }
        $this->info('pindah table InventarisJalan');
        $a = InventarisJalan::all();
        TujuanInventarisJalan::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanInventarisJalan::create($item->toArray());
        }
        $this->info('pindah table InventarisKontruksi');
        $a = InventarisKontruksi::all();
        TujuanInventarisKontruksi::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanInventarisKontruksi::create($item->toArray());
        }
        $this->info('pindah table InventarisPeralatan');
        $a = InventarisPeralatan::all();
        TujuanInventarisPeralatan::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanInventarisKontruksi::create($item->toArray());
        }
        $this->info('pindah table InventarisTanah');
        $a = InventarisTanah::all();
        TujuanInventarisTanah::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanInventarisTanah::create($item->toArray());
        }
    }
}
