<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Models\Asal\Config as AsalConfig;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Asal\SettingModul as AsalSettingModul;
use App\Models\Tujuan\SettingModul as TujuanSettingModul;
use App\Models\Asal\GrupAkse as AsalGrupAkse;
use App\Models\Tujuan\GrupAkse as TujuanGrupAkse;
use App\Models\Asal\UserGrup as AsalUserGrup;
use App\Models\Tujuan\UserGrup as TujuanUserGrup;

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
    protected $description = 'Sinkronisasi data config, setting_modul, user_grup, dan grup_akses antar database.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::transaction(function () {
            $this->info('Sinkronisasi dimulai...');

            $setConfigId = null;
            $idMappingModul = [];
            $idMappingUserGrup = [];

            // 1. Sinkronisasi Config
            $this->info('Sinkronisasi tabel config...');
            $configAsal = AsalConfig::all();
            foreach ($configAsal as $config) {
                $cekConfig = TujuanConfig::where('app_key', $config->app_key)->first();
                if (!$cekConfig) {
                    $configTujuan = TujuanConfig::create($config->toArray());
                    $setConfigId = $configTujuan->id;
                } else {
                    $setConfigId = $cekConfig->id;
                }
            }

            // 2. Sinkronisasi Setting Modul
            $this->info('Sinkronisasi tabel setting_modul...');
            TujuanSettingModul::where('config_id', $setConfigId)->delete();
            $modulAsal = AsalSettingModul::all();
            foreach ($modulAsal as $modul) {
                $dataModul = Arr::except($modul->toArray(), ['id']);
                $dataModul['config_id'] = $setConfigId;
                $dataModul['old_value'] = $modul->id;
                $modulTujuan = TujuanSettingModul::create($dataModul);
                $idMappingModul[$modul->id] = $modulTujuan->id;
            }

            // Perbarui Parent pada Setting Modul
            $this->info('Perbarui parent pada setting_modul...');
            foreach ($modulAsal as $modul) {
                if ($modul->parent) {
                    $parentTujuanId = $idMappingModul[$modul->parent] ?? null;
                    if ($parentTujuanId) {
                        TujuanSettingModul::where('old_value', $modul->id)->update(['parent' => $parentTujuanId]);
                    }
                }
            }

            // 3. Sinkronisasi User Grup
            $this->info('Sinkronisasi tabel user_grup...');
            $userGrupAsal = AsalUserGrup::all();
            foreach ($userGrupAsal as $userGrup) {
                $cekUserGrup = TujuanUserGrup::where('config_id', $setConfigId)
                    ->where('nama', $userGrup->nama)
                    ->first();

                if (!$cekUserGrup) {
                    $dataUserGrup = Arr::except($userGrup->toArray(), ['id']);
                    $dataUserGrup['config_id'] = $setConfigId;
                    $userGrupTujuan = TujuanUserGrup::create($dataUserGrup);
                    $idMappingUserGrup[$userGrup->id] = $userGrupTujuan->id;
                } else {
                    $idMappingUserGrup[$userGrup->id] = $cekUserGrup->id;
                }
            }

            // 4. Sinkronisasi Grup Akses
            $this->info('Sinkronisasi tabel grup_akses...');
            $grupAksesAsal = AsalGrupAkse::all();
            foreach ($grupAksesAsal as $grupAkses) {
                $idGrupTujuan = $idMappingUserGrup[$grupAkses->id_grup] ?? null;
                $idModulTujuan = $idMappingModul[$grupAkses->id_modul] ?? null;

                if ($idGrupTujuan && $idModulTujuan) {
                    TujuanGrupAkse::create([
                        'config_id' => $setConfigId,
                        'id_grup' => $idGrupTujuan,
                        'id_modul' => $idModulTujuan,
                        'akses' => $grupAkses->akses,
                    ]);
                }
            }

            $this->info('Sinkronisasi selesai.');
        });
    }
}
