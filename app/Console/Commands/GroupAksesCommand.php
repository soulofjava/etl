<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Asal\Config;
use Illuminate\Support\Facades\DB;
use App\Models\Asal\GrupAkse as AsalGrupAkse;
use App\Models\Asal\UserGrup as AsalUserGrup;
use App\Models\Tujuan\UserGrup as TujuanUserGrup;
use App\Models\Asal\SettingModul as AsalSettingModul;
use App\Models\Tujuan\GrupAkse as TujuanGrupAkse;
use App\Models\Tujuan\SettingModul as TujuanSettingModul;
use Illuminate\Support\Arr;

class GroupAksesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:group-akses-command';

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
            echo $setConfigId;
            TujuanSettingModul::where('config_id', $setConfigId)->delete();
            // $asal = AsalGrupAkse::get();
            // $this->info('line 56');
            // foreach ($asal as $item) {
            //     $asalnya = Arr::except($item->toArray(), ['id']);
            //     // $asalnya['config_id'] = $setConfigId;
            //     $hasil = TujuanGrupAkse::create($asalnya);
            //     $b = AsalGrupAkse::where('id_grup', $item->id)->update(['id_grup' => $hasil->id]);
            //     $this->info('line 62');
            // }

            $modul = AsalSettingModul::get();

            $b = [];
            foreach ($modul as $a) {
                // echo $a->modul;
                if ($a->modul ?? '') {
                    $asalnyamodul = Arr::except($a->toArray(), ['id']);
                    // print_r($asalnyamodul);
                    $asalnyamodul['config_id'] = $setConfigId;
                    $asalnyamodul['old_value'] = $a->id;
                    $hasilmodul = TujuanSettingModul::create($asalnyamodul);

                    // array_push($b, ['asli' => $a->id, 'hasil' => $hasilmodul->id]);
                    // AsalGrupAkse::where('id_modul', $a->id)->update(['id_modul' => $a->id]);
                    // $this->info('line 73');
                }
            }
            // $nm = AsalSettingModul::get();
            // foreach ($nm  as $as) {
            //     $asalnyamodul = Arr::except($as->toArray(), ['id']);
            //     // $asalnyamodul['config_id'] = $setConfigId;
            //     $asalnyamodul['old_value'] = $as->id;
            //     $a = TujuanSettingModul::create($asalnyamodul);
            // }
            // $nm = AsalSettingModul::get();
            // foreach ($nm  as $as) {
            //     $asalnyamodul = Arr::except($as->toArray(), ['id']);
            //     // $asalnyamodul['config_id'] = $setConfigId;
            //     if ($as->parent != 0) {
            //         $a = TujuanSettingModul::where('old_value', $as->parent)->first();
            //         TujuanSettingModul::where('parent', $as->parent)->update(['parent' => $a->id]);
            //         $this->info('line 89');
            //     }
            // }

            $asu = AsalUserGrup::get();

            foreach ($asu as $asuu) {
                // echo $asuu->nama;
                // echo $setConfigId;
                $ajk =  TujuanUserGrup::where('config_id', $setConfigId)->where('nama', $asuu->nama)->first();
                $this->info("line 105");
                if (!$ajk) {
                    $this->info("line 111");
                    $asalnyamodul = Arr::except($asuu->toArray(), ['id', 'slug']);
                    $asalnyamodul['config_id'] = $setConfigId;

                    TujuanUserGrup::create($asalnyamodul);
                }
            }


            $AsalGrupAkse = AsalGrupAkse::get();
            foreach ($AsalGrupAkse as $bm) {
                // echo "a" . $bm->id_modul;
                $asalnyamodul = Arr::except($bm->toArray(), ['id']);
                $asalusergrup = AsalUserGrup::where('id', $bm->id_grup)->first();
                // print_r($asalusergrup->nama ?? 'asu');
                $idgroup = TujuanUserGrup::where('config_id', $setConfigId)->where('nama', $asalusergrup->nama)->first();

                $tujuanidmodul = TujuanSettingModul::where('old_value', $bm->id_modul)->first();
                // dd($tujuanidmodul->id);

                TujuanGrupAkse::create([
                    'config_id' => $setConfigId,
                    'id_grup' =>  $idgroup->id,
                    'id_modul' => $tujuanidmodul->id,
                    'akses' => $bm->akses
                ]);
            }
        });
    }
}
