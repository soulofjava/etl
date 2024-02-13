<?php

namespace App\Console\Commands;

use App\Models\Asal\Config;
use App\Models\Asal\Url;
use App\Models\Asal\User;
use App\Models\Asal\UserGrup;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Tujuan\Url as TujuanUrl;
use App\Models\Tujuan\User as TujuanUser;
use App\Models\Tujuan\UserGrup as TujuanUserGrup;
use Illuminate\Console\Command;

class UCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:u-command';

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

        $this->info('pindah table urls');
        $a = Url::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanUrl::create($item->toArray());
        }

        $this->info('pindah table user');
        $a = User::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanUser::create($item->toArray());
        }

        $this->info('pindah table user_grup');
        $a = UserGrup::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanUserGrup::create($item->toArray());
        }
    }
}
