<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asal\TwebKeluarga as AsalKeluarga;
use App\Models\Tujuan\TwebKeluarga as TujuanKeluarga;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Asal\Config;
use App\Models\Tujuan\Dtk;
use App\Models\Tujuan\TwebPenduduk;
use App\Models\Tujuan\TwebRtm;
use DB;
use Illuminate\Support\Arr;

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
        DB::transaction(function () {


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

            TujuanKeluarga::where('config_id',  $setConfigId)->delete();
            TwebPenduduk::where('config_id',  $setConfigId)->delete();
            Dtk::where('config_id',  $setConfigId)->delete();
            TwebRtm::where('config_id',  $setConfigId)->delete();
            $data = AsalKeluarga::with(['penduduk' => function ($a) {
                $a->with(['dtks', 'dtks_anggota', 'rtm']);
            }, 'dtks'])->get();

            foreach ($data as $asal) {

                $asalnya = Arr::except($asal->toArray(), ['id']);
                $asalnya['config_id'] =   $setConfigId;
                // $this->info('masukkan keluarga');
                $a = TujuanKeluarga::create($asalnya);
                foreach ($asal->dtks ?? [] as $dtks) {
                    // echo $a->id."\n";
                    $isidtks = Arr::except($dtks->toArray(), ['id']);
                    $isidtks['config_id'] =  $setConfigId;
                    // $isidtks['id_keluarga'] =  $a->id;

                    // $this->info('masukkan dtks');
                    $hasildtks = $a->dtks()->create($isidtks);
                }
                foreach ($asal->penduduk as $penduduk) {
                    $isian = $penduduk->toArray();
                    $isian = Arr::except($isian, ['id_kk', 'dtks', 'dtks_anggota', 'id', 'rtm']);
                    $isian['config_id'] =  $setConfigId;

                    // $this->info('masukkan penduduk');
                    $pendu =  $a->penduduk()->create($isian);
                    // masukkan rtm
                    if ($penduduk->rtm) {
                        $rtm = Arr::except($penduduk->rtm->toArray(), ['id', 'nik_kepala']);
                        $rtm['config_id'] =  $setConfigId;

                        $rtm =   $pendu->rtm()->create($rtm);
                    }
                    //masukkan penduduk dtks

                    // masukkan anggota dtks
                    foreach ($penduduk->dtks_anggota ?? [] as $anggotadt) {
                        $isianggotadt = Arr::except($anggotadt->toArray(), ['id_dtks', 'id']);
                        $isianggotadt['config_id'] =  $setConfigId;
                        $isianggotadt['id_penduduk'] =  $pendu->id;
                        $isianggotadt['id_keluarga'] =  $a->id;
                        $isianggotadt['id_dtks'] =  $hasildtks->id;
                        $isianggotadt['id_rtm'] =  $rtm->id ?? null;
                        // $this->info('masukkan anggota dtks');
                        $pendu->dtks_anggota()->create($isianggotadt);
                    }
                }
            }
        });
    }
}
