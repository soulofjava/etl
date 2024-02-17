<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Arr;
use App\Models\Asal\Config;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Asal\AnalisisTipeIndikator as AsalAnalisisTipeIndikator;
use App\Models\Tujuan\AnalisisTipeIndikator as TujuanAnalisisTipeIndikator;
use App\Models\Asal\AnalisisMaster as AsalAnalisisMaster;
use App\Models\Tujuan\AnalisisMaster as TujuanAnalisisMaster;
use App\Models\Tujuan\AnalisisKategoriIndikator as TujuanAnalisisKategoriIndikator;
use App\Models\Tujuan\AnalisisIndikator as TujuanAnalisisIndikator;
use App\Models\Tujuan\AnalisisParameter as TujuanAnalisisParameter;
use App\Models\Asal\AnalisisRefState as AsalAnalisisRefState;
use App\Models\Tujuan\AnalisisRefState as TujuanAnalisisRefState;
use App\Models\Asal\AnalisisRefSubjek as AsalAnalisisRefSubjek;
use App\Models\Tujuan\AnalisisRefSubjek as TujuanAnalisisRefSubjek;
use App\Models\Tujuan\AnalisisKlasifikasi as TujuanAnalisisKlasifikasi;
use App\Models\Tujuan\AnalisisPeriode as TujuanAnalisisPeriode;
use App\Models\Asal\AnalisisRespon as AsalAnalisisRespon;
use App\Models\Tujuan\AnalisisRespon as TujuanAnalisisRespon;

class AnalisisCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:analisis-command';

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
            TujuanAnalisisMaster::where('config_id', $setConfigId)->delete();
            TujuanAnalisisKategoriIndikator::where('config_id', $setConfigId)->delete();
            TujuanAnalisisIndikator::where('config_id', $setConfigId)->delete();
            TujuanAnalisisParameter::where('config_id', $setConfigId)->delete();
            TujuanAnalisisKlasifikasi::where('config_id', $setConfigId)->delete();
            TujuanAnalisisPeriode::where('config_id', $setConfigId)->delete();
            TujuanAnalisisRespon::where('config_id', $setConfigId)->delete();

            $this->info('pindah data AnalisisTipeIndikator');
            $asalAnalisisTipeIndikator = AsalAnalisisTipeIndikator::all();
            foreach ($asalAnalisisTipeIndikator as $item) {
                $cek = TujuanAnalisisTipeIndikator::where('id', $item->id)->first();
                if (!$cek) {
                    TujuanAnalisisTipeIndikator::create($item->toArray());
                }
            }
            $this->info('pindah data AnalisisRefState');
            $AsalAnalisisRefState = AsalAnalisisRefState::all();
            foreach ($AsalAnalisisRefState as $item) {
                $cek = TujuanAnalisisRefState::where('id', $item->id)->first();
                if (!$cek) {
                    TujuanAnalisisRefState::create($item->toArray());
                }
            }
            $this->info('pindah data AnalisisRefSubjek');
            $AsalAnalisisRefSubjek = AsalAnalisisRefSubjek::all();
            foreach ($AsalAnalisisRefSubjek as $item) {
                $cek = TujuanAnalisisRefSubjek::where('id', $item->id)->first();
                if (!$cek) {
                    $a = TujuanAnalisisRefSubjek::create($item->toArray());
                }
            }

            $data = AsalAnalisisMaster::with([
                'analisisIndikator' => function ($a) {
                    $a->with(['analisisKategoriIndikator']);
                }, 'analisisKategoriIndikator', 'analisisKlasifikasi', 'analisisPeriode'
            ])->get();
            foreach ($data as $asal) {
                $asalnya = Arr::except($asal->toArray(), ['id']);
                $asalnya['config_id'] =   $setConfigId;
                $hasilTujuanAnalisisMaster = TujuanAnalisisMaster::create($asalnya);
                $this->info('pindah data analisis master');
                foreach ($asal->analisisKategoriIndikator ?? [] as $analisisKategoriIndikator) {
                    $isianalisisKategoriIndikator =  Arr::except($analisisKategoriIndikator->toArray(), ['id']);
                    $isianalisisKategoriIndikator['config_id'] =   $setConfigId;
                    $hasilanalisisKategoriIndikator = $hasilTujuanAnalisisMaster->analisisKategoriIndikator()->create($isianalisisKategoriIndikator);
                    $this->info('pindah data analisisKategoriIndikator');
                }
                foreach ($asal->analisisPeriode ?? [] as $analisisPeriode) {
                    $this->info('pindah data analisisPeriode');
                    $isianalisisPeriode = Arr::except($analisisPeriode->toArray(), ['id']);
                    $isianalisisPeriode['config_id'] = $setConfigId;
                    $hasilAnalisisPeriode = $hasilTujuanAnalisisMaster->analisisPeriode()->create($isianalisisPeriode);
                }
                foreach ($asal->analisisIndikator ?? [] as $analisisIndikator) {
                    $isianalisisIndikator =  Arr::except($analisisIndikator->toArray(), ['id', 'id_master', 'id_kategori']);
                    $isianalisisIndikator['id_kategori'] = $hasilanalisisKategoriIndikator->id;
                    $isianalisisIndikator['config_id'] =   $setConfigId;
                    $hasilanalisisIndikator = $hasilTujuanAnalisisMaster->analisisIndikator()->create($isianalisisIndikator);
                    $this->info('pindah data analisisIndikator');
                    foreach ($analisisIndikator->analisisParameter ?? [] as $analisisParameter) {
                        $isianalisisParameter = Arr::except($analisisParameter->toArray(), ['id', 'id_indikator']);
                        $isianalisisParameter['id_indikator'] = $hasilanalisisIndikator->id;
                        $isianalisisParameter['config_id'] = $setConfigId;
                        $hasilanalisisParameter = $hasilanalisisIndikator->analisisParameter()->create($isianalisisParameter);

                        $this->info('pindah data analisisParameter');
                        foreach ($analisisParameter->analisisRespon ?? [] as $analisisRespon) {
                            $this->info('pindah data analisisRespon');
                            $isiAnalisisRespon = $analisisRespon->toArray();
                            $isiAnalisisRespon['config_id'] = $setConfigId;
                            $hasilanalisisParameter->analisisRespon()->create($isiAnalisisRespon);
                        }
                    }


                    //analisisRespon Ambigu di id_paramater tidak sesuai

                }

                foreach ($asal->analisisKlasifikasi ?? [] as $analisisKlasifikasi) {
                    $this->info('pindah data analisisKlasifikasi');
                    $isianalisisKlasifikasi = Arr::except($analisisKlasifikasi->toArray(), ['id']);
                    $isianalisisKlasifikasi['config_id'] = $setConfigId;
                    $hasilTujuanAnalisisMaster->analisisKlasifikasi()->create($isianalisisKlasifikasi);
                }
            }
        });
    }
}
