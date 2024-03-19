<?php

namespace App\Console\Commands;

use App\Models\Asal\Config;
use App\Models\Asal\Pengaduan;
use App\Models\Asal\Pesan;
use App\Models\Asal\PesanDetail;
use App\Models\Asal\Posyandu;
use App\Models\Asal\Program;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Tujuan\Pengaduan as TujuanPengaduan;
use App\Models\Tujuan\Pesan as TujuanPesan;
use App\Models\Tujuan\PesanDetail as TujuanPesanDetail;
use App\Models\Tujuan\Posyandu as TujuanPosyandu;
use App\Models\Tujuan\Program as TujuanProgram;
use Illuminate\Console\Command;

class PCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:p-command';

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

        $this->info('pindah table pesan');
        $a = Pesan::all();
        TujuanPesan::where('config_id', $setConfigId)->delete();
        TujuanPesanDetail::where('config_id', $setConfigId)->delete();
        $pesanDetail = "";
        foreach ($a as $pesan) {
            // Set the new config_id
            $pesan->config_id = $setConfigId;

            // Create a new record in TujuanPesan
            $tujuanPesan = TujuanPesan::create($pesan->toArray());

            // Find the related PesanDetail
            $pesanDetail = PesanDetail::where('pesan_id', $pesan->id)->get();

            // If PesanDetail exists, create a new record in TujuanPesanDetail
            if ($pesanDetail) {
                foreach ($pesanDetail as $hallo) {
                    // Update pesan_id to the newly created TujuanPesan record
                    $hallo->pesan_id = $tujuanPesan->id;
                    $hallo->config_id = $setConfigId; // Set the new config_id if needed

                    // Create a new record in TujuanPesanDetail
                    TujuanPesanDetail::create($hallo->toArray());
                }
            }
        }

        $this->info('pindah table posyandu');
        $a = Posyandu::all();
        TujuanPosyandu::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanPosyandu::create($item->toArray());
        }

        $this->info('pindah table pengaduan');
        $a = Pengaduan::all();
        TujuanPengaduan::where('config_id', $setConfigId)->delete();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanPengaduan::create($item->toArray());
        }

        $a = Program::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            $cek = TujuanProgram::where('config_id', $setConfigId)->where('nama', $item->nama)->first();

            if (!$cek) {
                // Create a new record in the destination table
                TujuanProgram::create($item->toArray());
            }
        }
    }
}
