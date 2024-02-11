<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asal\Config;
use App\Models\Asal\GisSimbol;
use App\Models\Asal\GrupAkse;
use App\Models\Asal\User;
use App\Models\Asal\UserGrup;
use App\Models\Tujuan\User as TujuanUser;
use App\Models\Tujuan\UserGrup as TujuanUserGrup;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Tujuan\GisSimbol as TujuanGisSimbol;
use App\Models\Tujuan\GrupAkse as TujuanGrupAkse;

class GCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:g-command';

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

        $this->info('pindah table GisSimbol');
        $a = GisSimbol::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanGisSimbol::where('config_id', $setConfigId)->where('simbol', $item->simbol)->first();
            if (!$cek) {
                TujuanGisSimbol::create($item->toArray());
            }
        }

        $this->info('pindah table GrupAkses');
        $a = GrupAkse::all();

        foreach ($a as $item) {
            $item->config_id = $setConfigId;

            // Check if the corresponding id_grup exists in user_grup table
            $userGrupExists = UserGrup::where('id', $item->id_grup)->exists();

            if ($userGrupExists) {
                $cek = TujuanGrupAkse::where('config_id', $setConfigId)->first();

                if (!$cek) {
                    TujuanGrupAkse::create($item->toArray());
                }
            } else {
                $this->info("User Grup with id {$item->id_grup} does not exist.");
            }
        }
    }
}
