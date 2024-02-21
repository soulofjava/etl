<?php

namespace App\Console\Commands;

use App\Models\Asal\Config;
use App\Models\Asal\Url;
use App\Models\Asal\User;
use App\Models\Asal\UserGrup;
use App\Models\Tujuan\Artikel;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Tujuan\Kategori;
use App\Models\Tujuan\Url as TujuanUrl;
use App\Models\Tujuan\User as TujuanUser;
use App\Models\Tujuan\UserGrup as TujuanUserGrup;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

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

        TujuanUrl::where('config_id',  $setConfigId)->delete();
        $this->info('pindah table urls');
        $a = Url::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanUrl::create($item->toArray());
        }

        $this->info('pindah table user');

        TujuanUser::where('config_id',  $setConfigId)->delete();
        TujuanUserGrup::where('config_id',  $setConfigId)->delete();
        Kategori::where('config_id',  $setConfigId)->delete();
        Artikel::where('config_id',  $setConfigId)->delete();
        $a = User::with(['user_grup', 'artikel' => function ($a) {
            $a->with(['kategori']);
        }])->get();
        foreach ($a as $item) {
            if ($item->pamong_id == "") {
                if ($item->user_grup) {
                    $grup = TujuanUserGrup::where('config_id',  $setConfigId)->where('slug', $item->user_grup->slug)->first();
                    if ($grup == null) {
                        $isianusergrup = Arr::except($item->user_grup->toArray(), ['id', 'slug']);
                        $isianusergrup['config_id'] = $setConfigId;
                        $grup = TujuanUserGrup::firstOrCreate($isianusergrup);
                    }

                    $isianuser = Arr::except($item->toArray(), ['id', 'id_grup']);
                    $isianuser['config_id'] = $setConfigId;
                    $isianuser['id_grup'] = $grup->id;
                    $user = TujuanUser::create($isianuser);

                    if ($item->artikel) {
                        foreach ($item->artikel as $arti) {
                            if ($arti->kategori) {
                                $kate = Kategori::where('config_id',  $setConfigId)->where('slug', $arti->kategori->slug)->first();
                                if ($kate == null) {
                                    $isiankategori = Arr::except($arti->kategori->toArray(), ['id', 'slug']);
                                    $isiankategori['config_id'] = $setConfigId;
                                    $kate = Kategori::firstOrCreate($isiankategori);
                                }
                            }

                            $isianartikel = Arr::except($arti->toArray(), ['id', 'slug', 'id_kategori', 'id_user']);
                            $isianartikel['config_id'] = $setConfigId;
                            $isianartikel['id_user'] = $user->id;
                            $isianartikel['id_kategori'] = $kate->id ?? '999';
                            $user->artikel()->create($isianartikel);
                        }
                    }
                }
            }
        }
    }
}
