<?php

namespace App\Console\Commands;

use App\Models\Asal\Config;
use App\Models\Asal\MediaSosial;
use App\Models\Asal\Menu;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Tujuan\MediaSosial as TujuanMediaSosial;
use App\Models\Tujuan\Menu as TujuanMenu;
use Illuminate\Console\Command;

class MCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:m-command';

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

        $this->info('pindah table media_sosial');
        $a = MediaSosial::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanMediaSosial::create($item->toArray());
        }

        $this->info('pindah table menu');
        $a = Menu::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanMenu::create($item->toArray());
        }
    }
}
