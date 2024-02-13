<?php

namespace App\Console\Commands;

use App\Models\Asal\Config;
use App\Models\Asal\RefJabatan;
use App\Models\Asal\RefSyaratSurat;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Tujuan\RefJabatan as TujuanRefJabatan;
use App\Models\Tujuan\RefSyaratSurat as TujuanRefSyaratSurat;
use Illuminate\Console\Command;

class RCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:r-command';

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

        $this->info('pindah table ref_jabatan');
        $a = RefJabatan::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanRefJabatan::create($item->toArray());
        }

        $this->info('pindah table ref_syarat_surat');
        $a = RefSyaratSurat::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanRefSyaratSurat::create($item->toArray());
        }
    }
}
