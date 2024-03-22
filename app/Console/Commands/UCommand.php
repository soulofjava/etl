<?php

namespace App\Console\Commands;

use App\Models\Asal\Config;
use App\Models\Asal\TwebDesaPamong;
use App\Models\Asal\TwebPenduduk;
use App\Models\Asal\TwebSuratFormat;
use App\Models\Asal\Url;
use App\Models\Asal\User;
use App\Models\Asal\UserGrup;
use App\Models\Tujuan\Artikel;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Tujuan\Kategori;
use App\Models\Tujuan\TwebDesaPamong as TujuanTwebDesaPamong;
use App\Models\Tujuan\TwebPenduduk as TujuanTwebPenduduk;
use App\Models\Tujuan\TwebSuratFormat as TujuanTwebSuratFormat;
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
            $urls_id = TujuanUrl::create($item->toArray());

            if ($item->log_surat) {
                $id_format_surat = TwebSuratFormat::where('id', $item->log_surat->id_format_surat)->first();
                $this->info($id_format_surat->url_surat);
                $d_id_format_surat = TujuanTwebSuratFormat::where('config_id', $setConfigId)->where('url_surat', $id_format_surat->url_surat)->first();
                $id_pend = TwebPenduduk::where('id', $item->log_surat->id_pend)->first();
                $d_id_pend = TujuanTwebPenduduk::where('nik', $id_pend->nik)->first();
                $id_pamong = TwebDesaPamong::where('pamong_id', $item->log_surat->id_pamong)->first();
                $id_pend_pamong = TwebPenduduk::where('id', $id_pamong->id_pend)->first();
                $d_id_pend_pamong = TujuanTwebPenduduk::where('nik', $id_pend_pamong->nik)->first();
                $d_id_pamong = TujuanTwebDesaPamong::where('id_pend', $d_id_pend_pamong->id)->first();

                $isianlogsurat = Arr::except($item->log_surat->toArray(), ['id', 'urls_id']);
                $isianlogsurat['config_id'] = $setConfigId;
                $isianlogsurat['id_format_surat'] = $d_id_format_surat->id ?? null;
                $isianlogsurat['id_pend'] = $d_id_pend->id ?? null;
                $isianlogsurat['id_pamong'] = $d_id_pamong->pamong_id;
                $urls_id->log_surat()->create($isianlogsurat);
            }
        }

        $this->info('pindah table user');
        TujuanUser::where('pamong_id', null)->where('config_id',  $setConfigId)->delete();
        $a = User::with(['user_grup', 'artikel' => function ($a) {
            $a->with(['kategori', 'agendas']);
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
                        $this->info('aaa ');
                        foreach ($item->artikel as $arti) {
                            if ($arti->kategori) {
                                $kate = Kategori::where('config_id',  $setConfigId)->where('kategori', $arti->kategori->kategori)->first();
                                if (!$kate) {
                                    $isiankategori = Arr::except($arti->kategori->toArray(), ['id', 'slug']);
                                    $isiankategori['config_id'] = $setConfigId;
                                    $kate = Kategori::firstOrCreate($isiankategori);
                                }
                            }
                            if ($arti->id_kategori != '999' && $arti->id_kategori != '1000') {
                                $arti->id_kategori = $kate->id;
                            }
                            $isianartikel = Arr::except($arti->toArray(), ['id', 'slug', 'id_user']);
                            $isianartikel['config_id'] = $setConfigId;
                            $isianartikel['id_user'] = $user->id;
                            $artikel = $user->artikel()->create($isianartikel);
                            if ($arti->agendas) {
                                foreach ($arti->agendas as $agenda) {
                                    $isianagenda = Arr::except($agenda->toArray(), ['id', 'id_artikel']);
                                    $artikel->agendas()->create($isianagenda);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
