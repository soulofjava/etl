<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asal\Config;
use App\Models\Asal\KaderPemberdayaanMasyarakat;
use App\Models\Asal\Kategori;
use App\Models\Asal\KehadiranAlasanKeluar;
use App\Models\Asal\KehadiranHariLibur;
use App\Models\Asal\KehadiranJamKerja;
use App\Models\Asal\Kelompok;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Tujuan\KaderPemberdayaanMasyarakat as TujuanKaderPemberdayaanMasyarakat;
use App\Models\Tujuan\Kategori as TujuanKategori;
use App\Models\Tujuan\KehadiranAlasanKeluar as TujuanKehadiranAlasanKeluar;
use App\Models\Tujuan\KehadiranHariLibur as TujuanKehadiranHariLibur;
use App\Models\Tujuan\KehadiranJamKerja as TujuanKehadiranJamKerja;
use App\Models\Tujuan\Kelompok as TujuanKelompok;

class KCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:k-command';

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

        // $this->info('pindah table KaderPemberdayaanMasyarakat');
        // $a = KaderPemberdayaanMasyarakat::all();
        // TujuanKaderPemberdayaanMasyarakat::where('config_id', $setConfigId)->delete();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     TujuanKaderPemberdayaanMasyarakat::create($item->toArray());
        // }
        // $this->info('pindah table Kategori');
        // $a = Kategori::all();
        // TujuanKategori::where('config_id', $setConfigId)->delete();
        // $cek = TujuanKategori::where("config_id", $item->config_id)->where('slug', $item->slug)->first();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     if (!$cek) {
        //         TujuanKategori::create($item->toArray());
        //     }
        // }
        // $this->info('pindah table KehadiranAlasanKeluar');
        // $a = KehadiranAlasanKeluar::all();
        // TujuanKehadiranAlasanKeluar::where('config_id', $setConfigId)->delete();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     TujuanKehadiranAlasanKeluar::create($item->toArray());
        // }
        // $this->info('pindah table KehadiranHariLibur');
        // $a = KehadiranHariLibur::all();
        // TujuanKehadiranHariLibur::where('config_id', $setConfigId)->delete();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     TujuanKehadiranHariLibur::create($item->toArray());
        // }

        // $this->info('pindah table KehadiranJamKerja');
        // $a =  KehadiranJamKerja::all();
        // TujuanKehadiranJamKerja::where('config_id', $setConfigId)->delete();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     TujuanKehadiranJamKerja::create($item->toArray());
        // }
        $this->info('pindah table Kelompok');
        $a =  Kelompok::all();
        TujuanKelompok::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $item->id_lama = $item->id;
            $cek = TujuanKelompok::where('config_id', $item->config_id)->where('slug', $item->slug)->first();
            if (!$cek) {
                TujuanKelompok::create($item->toArray());
            }
        }
        // $this->info('pindah table Kelompok');
        // $a =  Kelompok::all();
        // TujuanKelompok::where('config_id', $setConfigId)->delete();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanKelompok::where('config_id', $item->config_id)->where('slug', $item->slug)->first();
        //     if (!$cek) {
        //         TujuanKelompok::create($item->toArray());
        //     }
        // }
    }
}
