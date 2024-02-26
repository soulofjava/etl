<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asal\Config;
use App\Models\Tujuan\Config as TujuanConfig;
use Illuminate\Support\Arr;
use App\Models\Asal\KeuanganMaster as AsalKeuanganMaster;
use App\Models\Tujuan\KeuanganMaster as TujuanKeuanganMaster;
use App\Models\Tujuan\KeuanganRefBankDesa as TujuanKeuanganRefBankDesa;
use App\Models\Tujuan\KeuanganRefBelOperasional as TujuanKeuanganRefBelOperasional;
use App\Models\Tujuan\KeuanganRefBidang as TujuanKeuanganRefBidang;
use App\Models\Tujuan\KeuanganRefBunga as TujuanKeuanganRefBunga;
use App\Models\Tujuan\KeuanganRefDesa as TujuanKeuanganRefDesa;
use App\Models\Tujuan\KeuanganRefKecamatan as TujuanKeuanganRefKecamatan;
use App\Models\Tujuan\KeuanganRefKegiatan as TujuanKeuanganRefKegiatan;
use App\Models\Tujuan\KeuanganRefKorolari as TujuanKeuanganRefKorolari;
use App\Models\Tujuan\KeuanganRefNeracaClose as TujuanKeuanganRefNeracaClose;
use App\Models\Tujuan\KeuanganRefPerangkat as TujuanKeuanganRefPerangkat;
use App\Models\Tujuan\KeuanganRefPotongan as TujuanKeuanganRefPotongan;
use App\Models\Tujuan\KeuanganRefRek1 as TujuanKeuanganRefRek1;
use App\Models\Tujuan\KeuanganRefRek2 as TujuanKeuanganRefRek2;
use App\Models\Tujuan\KeuanganRefRek3 as TujuanKeuanganRefRek3;
use App\Models\Tujuan\KeuanganRefRek4 as TujuanKeuanganRefRek4;
use App\Models\Tujuan\KeuanganRefSbu as TujuanKeuanganRefSbu;
use App\Models\Tujuan\KeuanganRefSumber as TujuanKeuanganRefSumber;
use App\Models\Tujuan\KeuanganTaAnggaran as TujuanKeuanganTaAnggaran;
use App\Models\Tujuan\KeuanganTaAnggaranLog as TujuanKeuanganTaAnggaranLog;
use App\Models\Tujuan\KeuanganTaAnggaranRinci as TujuanKeuanganTaAnggaranRinci;
use App\Models\Tujuan\KeuanganTaBidang as TujuanKeuanganTaBidang;
use App\Models\Tujuan\KeuanganTaDesa as TujuanKeuanganTaDesa;
use App\Models\Tujuan\KeuanganTaJurnalUmum as TujuanKeuanganTaJurnalUmum;
use App\Models\Tujuan\KeuanganTaJurnalUmumRinci as TujuanKeuanganTaJurnalUmumRinci;
use App\Models\Tujuan\KeuanganTaKegiatan as TujuanKeuanganTaKegiatan;
use App\Models\Tujuan\KeuanganTaMutasi as TujuanKeuanganTaMutasi;
use App\Models\Tujuan\KeuanganTaPajak as TujuanKeuanganTaPajak;
use App\Models\Tujuan\KeuanganTaPajakRinci as TujuanKeuanganTaPajakRinci;
use App\Models\Tujuan\KeuanganTaPemda as TujuanKeuanganTaPemda;
use App\Models\Tujuan\KeuanganTaPencairan as TujuanKeuanganTaPencairan;
use App\Models\Tujuan\KeuanganTaPerangkat as TujuanKeuanganTaPerangkat;
use App\Models\Tujuan\KeuanganTaRab as TujuanKeuanganTaRab;
use App\Models\Tujuan\KeuanganTaRabRinci as TujuanKeuanganTaRabRinci;
use App\Models\Tujuan\KeuanganTaRabSub as TujuanKeuanganTaRabSub;
use App\Models\Tujuan\KeuanganTaRpjmBidang as TujuanKeuanganTaRpjmBidang;
use App\Models\Tujuan\KeuanganTaRpjmKegiatan as TujuanKeuanganTaRpjmKegiatan;
use App\Models\Tujuan\KeuanganTaRpjmMisi as TujuanKeuanganTaRpjmMisi;
use App\Models\Tujuan\KeuanganTaRpjmPaguIndikatif as TujuanKeuanganTaRpjmPaguIndikatif;
use App\Models\Tujuan\KeuanganTaRpjmPaguTahunan as TujuanKeuanganTaRpjmPaguTahunan;
use App\Models\Tujuan\KeuanganTaRpjmSasaran as TujuanKeuanganTaRpjmSasaran;
use App\Models\Tujuan\KeuanganTaRpjmTujuan as TujuanKeuanganTaRpjmTujuan;
use App\Models\Tujuan\KeuanganTaRpjmVisi as TujuanKeuanganTaRpjmVisi;
use App\Models\Tujuan\KeuanganTaSaldoAwal as TujuanKeuanganTaSaldoAwal;
use App\Models\Tujuan\KeuanganTaSpj as TujuanKeuanganTaSpj;
use App\Models\Tujuan\KeuanganTaSpjBukti as TujuanKeuanganTaSpjBukti;
use App\Models\Tujuan\KeuanganTaSpjRinci as TujuanKeuanganTaSpjRinci;
use App\Models\Tujuan\KeuanganTaSpjSisa as TujuanKeuanganTaSpjSisa;
use App\Models\Tujuan\KeuanganTaSpjpot as TujuanKeuanganTaSpjpot;
use App\Models\Tujuan\KeuanganTaSpp as TujuanKeuanganTaSpp;
use App\Models\Tujuan\KeuanganTaSppRinci as TujuanKeuanganTaSppRinci;
use App\Models\Tujuan\KeuanganTaSppbukti as TujuanKeuanganTaSppbukti;
use App\Models\Tujuan\KeuanganTaSpppot as TujuanKeuanganTaSpppot;
use App\Models\Tujuan\KeuanganTaSt as TujuanKeuanganTaSt;
use App\Models\Tujuan\KeuanganTaStsRinci as TujuanKeuanganTaStsRinci;
use App\Models\Tujuan\KeuanganTaTbp as TujuanKeuanganTaTbp;
use App\Models\Tujuan\KeuanganTaTbpRinci as TujuanKeuanganTaTbpRinci;
use App\Models\Tujuan\KeuanganTaTriwulan as TujuanKeuanganTaTriwulan;
use App\Models\Tujuan\KeuanganTaTriwulanRinci as TujuanKeuanganTaTriwulanRinci;

class KeuanganCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:keuangan-command';

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

        TujuanKeuanganMaster::where('config_id', $setConfigId)->delete();
        TujuanKeuanganRefBankDesa::where('config_id', $setConfigId)->delete();
        TujuanKeuanganRefBelOperasional::where('config_id', $setConfigId)->delete();
        TujuanKeuanganRefBidang::where('config_id', $setConfigId)->delete();
        TujuanKeuanganRefBunga::where('config_id', $setConfigId)->delete();
        TujuanKeuanganRefDesa::where('config_id', $setConfigId)->delete();
        TujuanKeuanganRefKecamatan::where('config_id', $setConfigId)->delete();
        TujuanKeuanganRefKegiatan::where('config_id', $setConfigId)->delete();
        TujuanKeuanganRefKorolari::where('config_id', $setConfigId)->delete();
        TujuanKeuanganRefNeracaClose::where('config_id', $setConfigId)->delete();
        TujuanKeuanganRefPerangkat::where('config_id', $setConfigId)->delete();
        TujuanKeuanganRefPotongan::where('config_id', $setConfigId)->delete();
        TujuanKeuanganRefRek1::where('config_id', $setConfigId)->delete();
        TujuanKeuanganRefRek2::where('config_id', $setConfigId)->delete();
        TujuanKeuanganRefRek3::where('config_id', $setConfigId)->delete();
        TujuanKeuanganRefRek4::where('config_id', $setConfigId)->delete();
        TujuanKeuanganRefSbu::where('config_id', $setConfigId)->delete();
        TujuanKeuanganRefSumber::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaAnggaran::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaAnggaranLog::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaAnggaranRinci::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaBidang::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaDesa::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaJurnalUmum::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaJurnalUmumRinci::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaKegiatan::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaMutasi::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaPajak::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaPajakRinci::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaPemda::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaPencairan::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaPerangkat::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaRab::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaRabRinci::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaRabSub::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaRpjmBidang::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaRpjmKegiatan::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaRpjmMisi::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaRpjmPaguIndikatif::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaRpjmPaguTahunan::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaRpjmSasaran::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaRpjmTujuan::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaRpjmVisi::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaSaldoAwal::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaSpj::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaSpjBukti::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaSpjRinci::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaSpjSisa::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaSpjpot::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaSpp::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaSppRinci::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaSppbukti::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaSpppot::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaSt::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaStsRinci::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaTbp::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaTbpRinci::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaTriwulan::where('config_id', $setConfigId)->delete();
        TujuanKeuanganTaTriwulanRinci::where('config_id', $setConfigId)->delete();


        $data = AsalKeuanganMaster::get();
        foreach ($data as $asal) {
            $asalnya = Arr::except($asal->toArray(), ['id']);
            $asalnya['config_id'] = $setConfigId;
            $hasilTujuanKeuanganMaster = TujuanKeuanganMaster::create($asalnya);
            foreach ($asal->keuangan_ref_bank_desas as $keuangan_ref_bank_desas) {
                $isiankeuangan_ref_bank_desas = Arr::except($keuangan_ref_bank_desas->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ref_bank_desas['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ref_bank_desas()->create($isiankeuangan_ref_bank_desas);
            }
            foreach ($asal->keuangan_ref_bel_operasionals as $keuangan_ref_bel_operasionals) {
                $isiankeuangan_ref_bel_operasionals = Arr::except($keuangan_ref_bel_operasionals->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ref_bel_operasionals['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ref_bel_operasionals()->create($isiankeuangan_ref_bel_operasionals);
            }
            foreach ($asal->keuangan_ref_bidangs as $keuangan_ref_bidangs) {
                $isiankeuangan_ref_bidangs = Arr::except($keuangan_ref_bidangs->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ref_bidangs['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ref_bidangs()->create($isiankeuangan_ref_bidangs);
            }
            foreach ($asal->keuangan_ref_bungas as $keuangan_ref_bungas) {
                $isiankeuangan_ref_bungas = Arr::except($keuangan_ref_bungas->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ref_bungas['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ref_bungas()->create($isiankeuangan_ref_bungas);
            }
            foreach ($asal->keuangan_ref_desas as $keuangan_ref_desas) {
                $isiankeuangan_ref_desas = Arr::except($keuangan_ref_desas->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ref_desas['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ref_desas()->create($isiankeuangan_ref_desas);
            }
            foreach ($asal->keuangan_ref_kegiatans as $keuangan_ref_kegiatans) {
                $isiankeuangan_ref_kegiatans = Arr::except($keuangan_ref_kegiatans->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ref_kegiatans['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ref_kegiatans()->create($isiankeuangan_ref_kegiatans);
            }
            foreach ($asal->keuangan_ref_kecamatans as $keuangan_ref_kecamatans) {
                $isiankeuangan_ref_kecamatans = Arr::except($keuangan_ref_kecamatans->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ref_kecamatans['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ref_kecamatans()->create($isiankeuangan_ref_kecamatans);
            }
            foreach ($asal->keuangan_ref_kegiatans as $keuangan_ref_kegiatans) {
                $isiankeuangan_ref_kegiatans = Arr::except($keuangan_ref_kegiatans->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ref_kegiatans['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ref_kegiatans()->create($isiankeuangan_ref_kegiatans);
            }
            foreach ($asal->keuangan_ref_korolaris as $keuangan_ref_korolaris) {
                $isiankeuangan_ref_korolaris = Arr::except($keuangan_ref_korolaris->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ref_korolaris['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ref_korolaris()->create($isiankeuangan_ref_korolaris);
            }
            foreach ($asal->keuangan_ref_neraca_closes as $keuangan_ref_neraca_closes) {
                $isiankeuangan_ref_neraca_closes = Arr::except($keuangan_ref_neraca_closes->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ref_neraca_closes['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ref_neraca_closes()->create($isiankeuangan_ref_neraca_closes);
            }
            foreach ($asal->keuangan_ref_perangkats as $keuangan_ref_perangkats) {
                $isiankeuangan_ref_perangkats = Arr::except($keuangan_ref_perangkats->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ref_perangkats['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ref_perangkats()->create($isiankeuangan_ref_perangkats);
            }
            foreach ($asal->keuangan_ref_potongans as $keuangan_ref_potongans) {
                $isiankeuangan_ref_potongans = Arr::except($keuangan_ref_potongans->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ref_potongans['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ref_potongans()->create($isiankeuangan_ref_potongans);
            }
            foreach ($asal->keuangan_ref_rek1s as $keuangan_ref_rek1s) {
                $isiankeuangan_ref_rek1s = Arr::except($keuangan_ref_rek1s->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ref_rek1s['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ref_rek1s()->create($isiankeuangan_ref_rek1s);
            }
            foreach ($asal->keuangan_ref_rek2s as $keuangan_ref_rek2s) {
                $isiankeuangan_ref_rek2s = Arr::except($keuangan_ref_rek2s->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ref_rek2s['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ref_rek2s()->create($isiankeuangan_ref_rek2s);
            }
            foreach ($asal->keuangan_ref_rek3s as $keuangan_ref_rek3s) {
                $isiankeuangan_ref_rek3s = Arr::except($keuangan_ref_rek3s->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ref_rek3s['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ref_rek3s()->create($isiankeuangan_ref_rek3s);
            }
            foreach ($asal->keuangan_ref_rek4s as $keuangan_ref_rek4s) {
                $isiankeuangan_ref_rek4s = Arr::except($keuangan_ref_rek4s->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ref_rek4s['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ref_rek4s()->create($isiankeuangan_ref_rek4s);
            }
            foreach ($asal->keuangan_ref_sbus as $keuangan_ref_sbus) {
                $isiankeuangan_ref_sbus = Arr::except($keuangan_ref_sbus->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ref_sbus['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ref_sbus()->create($isiankeuangan_ref_sbus);
            }
            foreach ($asal->keuangan_ref_sumbers as $keuangan_ref_sumbers) {
                $isiankeuangan_ref_sumbers = Arr::except($keuangan_ref_sumbers->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ref_sumbers['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ref_sumbers()->create($isiankeuangan_ref_sumbers);
            }
            foreach ($asal->keuangan_ta_anggarans as $keuangan_ta_anggarans) {
                $isiankeuangan_ta_anggarans = Arr::except($keuangan_ta_anggarans->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_anggarans['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_anggarans()->create($isiankeuangan_ta_anggarans);
            }
            foreach ($asal->keuangan_ta_anggaran_logs as $keuangan_ta_anggaran_logs) {
                $isiankeuangan_ta_anggaran_logs = Arr::except($keuangan_ta_anggaran_logs->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_anggaran_logs['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_anggaran_logs()->create($isiankeuangan_ta_anggaran_logs);
            }
            foreach ($asal->keuangan_ta_anggaran_rincis as $keuangan_ta_anggaran_rincis) {
                $isiankeuangan_ta_anggaran_rincis = Arr::except($keuangan_ta_anggaran_rincis->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_anggaran_rincis['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_anggaran_rincis()->create($isiankeuangan_ta_anggaran_rincis);
            }
            foreach ($asal->keuangan_ta_bidangs as $keuangan_ta_bidangs) {
                $isiankeuangan_ta_bidangs = Arr::except($keuangan_ta_bidangs->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_bidangs['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_bidangs()->create($isiankeuangan_ta_bidangs);
            }
            foreach ($asal->keuangan_ta_desas as $keuangan_ta_desas) {
                $isiankeuangan_ta_desas = Arr::except($keuangan_ta_desas->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_desas['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_desas()->create($isiankeuangan_ta_desas);
            }
            foreach ($asal->keuangan_ta_jurnal_umums as $keuangan_ta_jurnal_umums) {
                $isiankeuangan_ta_jurnal_umums = Arr::except($keuangan_ta_jurnal_umums->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_jurnal_umums['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_jurnal_umums()->create($isiankeuangan_ta_jurnal_umums);
            }
            foreach ($asal->keuangan_ta_jurnal_umum_rincis as $keuangan_ta_jurnal_umum_rincis) {
                $isiankeuangan_ta_jurnal_umum_rincis = Arr::except($keuangan_ta_jurnal_umum_rincis->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_jurnal_umum_rincis['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_jurnal_umum_rincis()->create($isiankeuangan_ta_jurnal_umum_rincis);
            }
            foreach ($asal->keuangan_ta_kegiatans as $keuangan_ta_kegiatans) {
                $isiankeuangan_ta_kegiatans = Arr::except($keuangan_ta_kegiatans->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_kegiatans['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_kegiatans()->create($isiankeuangan_ta_kegiatans);
            }
            foreach ($asal->keuangan_ta_mutasis as $keuangan_ta_mutasis) {
                $isiankeuangan_ta_mutasis = Arr::except($keuangan_ta_mutasis->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_mutasis['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_mutasis()->create($isiankeuangan_ta_mutasis);
            }
            foreach ($asal->keuangan_ta_pajaks as $keuangan_ta_pajaks) {
                $isiankeuangan_ta_pajaks = Arr::except($keuangan_ta_pajaks->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_pajaks['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_pajaks()->create($isiankeuangan_ta_pajaks);
            }
            foreach ($asal->keuangan_ta_pajak_rincis as $keuangan_ta_pajak_rincis) {
                $isiankeuangan_ta_pajak_rincis = Arr::except($keuangan_ta_pajak_rincis->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_pajak_rincis['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_pajak_rincis()->create($isiankeuangan_ta_pajak_rincis);
            }
            foreach ($asal->keuangan_ta_pemdas as $keuangan_ta_pemdas) {
                $isiankeuangan_ta_pemdas = Arr::except($keuangan_ta_pemdas->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_pemdas['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_pemdas()->create($isiankeuangan_ta_pemdas);
            }
            foreach ($asal->keuangan_ta_pencairans as $keuangan_ta_pencairans) {
                $isiankeuangan_ta_pencairans = Arr::except($keuangan_ta_pencairans->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_pencairans['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_pencairans()->create($isiankeuangan_ta_pencairans);
            }
            foreach ($asal->keuangan_ta_perangkats as $keuangan_ta_perangkats) {
                $isiankeuangan_ta_perangkats = Arr::except($keuangan_ta_perangkats->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_perangkats['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_perangkats()->create($isiankeuangan_ta_perangkats);
            }
            foreach ($asal->keuangan_ta_rabs as $keuangan_ta_rabs) {
                $isiankeuangan_ta_rabs = Arr::except($keuangan_ta_rabs->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_rabs['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_rabs()->create($isiankeuangan_ta_rabs);
            }
            foreach ($asal->keuangan_ta_rab_rincis as $keuangan_ta_rab_rincis) {
                $isiankeuangan_ta_rab_rincis = Arr::except($keuangan_ta_rab_rincis->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_rab_rincis['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_rab_rincis()->create($isiankeuangan_ta_rab_rincis);
            }
            foreach ($asal->keuangan_ta_rab_subs as $keuangan_ta_rab_subs) {
                $isiankeuangan_ta_rab_subs = Arr::except($keuangan_ta_rab_subs->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_rab_subs['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_rab_subs()->create($isiankeuangan_ta_rab_subs);
            }
            foreach ($asal->keuangan_ta_rpjm_bidangs as $keuangan_ta_rpjm_bidangs) {
                $isiankeuangan_ta_rpjm_bidangs = Arr::except($keuangan_ta_rpjm_bidangs->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_rpjm_bidangs['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_rpjm_bidangs()->create($isiankeuangan_ta_rpjm_bidangs);
            }
            foreach ($asal->keuangan_ta_rpjm_kegiatans as $keuangan_ta_rpjm_kegiatans) {
                $isiankeuangan_ta_rpjm_kegiatans = Arr::except($keuangan_ta_rpjm_kegiatans->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_rpjm_kegiatans['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_rpjm_kegiatans()->create($isiankeuangan_ta_rpjm_kegiatans);
            }
            foreach ($asal->keuangan_ta_rpjm_misis as $keuangan_ta_rpjm_misis) {
                $isiankeuangan_ta_rpjm_misis = Arr::except($keuangan_ta_rpjm_misis->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_rpjm_misis['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_rpjm_misis()->create($isiankeuangan_ta_rpjm_misis);
            }
            foreach ($asal->keuangan_ta_rpjm_pagu_indikatifs as $keuangan_ta_rpjm_pagu_indikatifs) {
                $isiankeuangan_ta_rpjm_pagu_indikatifs = Arr::except($keuangan_ta_rpjm_pagu_indikatifs->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_rpjm_pagu_indikatifs['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_rpjm_pagu_indikatifs()->create($isiankeuangan_ta_rpjm_pagu_indikatifs);
            }
            foreach ($asal->keuangan_ta_rpjm_pagu_tahunans as $keuangan_ta_rpjm_pagu_tahunans) {
                $isiankeuangan_ta_rpjm_pagu_tahunans = Arr::except($keuangan_ta_rpjm_pagu_tahunans->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_rpjm_pagu_tahunans['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_rpjm_pagu_tahunans()->create($isiankeuangan_ta_rpjm_pagu_tahunans);
            }
            foreach ($asal->keuangan_ta_rpjm_sasarans as $keuangan_ta_rpjm_sasarans) {
                $isiankeuangan_ta_rpjm_sasarans = Arr::except($keuangan_ta_rpjm_sasarans->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_rpjm_sasarans['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_rpjm_sasarans()->create($isiankeuangan_ta_rpjm_sasarans);
            }
            foreach ($asal->keuangan_ta_rpjm_tujuans as $keuangan_ta_rpjm_tujuans) {
                $isiankeuangan_ta_rpjm_tujuans = Arr::except($keuangan_ta_rpjm_tujuans->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_rpjm_tujuans['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_rpjm_tujuans()->create($isiankeuangan_ta_rpjm_tujuans);
            }
            foreach ($asal->keuangan_ta_rpjm_visis as $keuangan_ta_rpjm_visis) {
                $isiankeuangan_ta_rpjm_visis = Arr::except($keuangan_ta_rpjm_visis->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_rpjm_visis['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_rpjm_visis()->create($isiankeuangan_ta_rpjm_visis);
            }
            foreach ($asal->keuangan_ta_saldo_awals as $keuangan_ta_saldo_awals) {
                $isiankeuangan_ta_saldo_awals = Arr::except($keuangan_ta_saldo_awals->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_saldo_awals['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_saldo_awals()->create($isiankeuangan_ta_saldo_awals);
            }
            foreach ($asal->keuangan_ta_spjs as $keuangan_ta_spjs) {
                $isiankeuangan_ta_spjs = Arr::except($keuangan_ta_spjs->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_spjs['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_spjs()->create($isiankeuangan_ta_spjs);
            }
            foreach ($asal->keuangan_ta_spj_buktis as $keuangan_ta_spj_buktis) {
                $isiankeuangan_ta_spj_buktis = Arr::except($keuangan_ta_spj_buktis->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_spj_buktis['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_spj_buktis()->create($isiankeuangan_ta_spj_buktis);
            }
            foreach ($asal->keuangan_ta_spj_rincis as $keuangan_ta_spj_rincis) {
                $isiankeuangan_ta_spj_rincis = Arr::except($keuangan_ta_spj_rincis->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_spj_rincis['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_spj_rincis()->create($isiankeuangan_ta_spj_rincis);
            }
            foreach ($asal->keuangan_ta_spj_sisas as $keuangan_ta_spj_sisas) {
                $isiankeuangan_ta_spj_sisas = Arr::except($keuangan_ta_spj_sisas->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_spj_sisas['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_spj_sisas()->create($isiankeuangan_ta_spj_sisas);
            }
            foreach ($asal->keuangan_ta_spjpots as $keuangan_ta_spjpots) {
                $isiankeuangan_ta_spjpots = Arr::except($keuangan_ta_spjpots->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_spjpots['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_spjpots()->create($isiankeuangan_ta_spjpots);
            }
            foreach ($asal->keuangan_ta_spps as $keuangan_ta_spps) {
                $isiankeuangan_ta_spps = Arr::except($keuangan_ta_spps->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_spps['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_spps()->create($isiankeuangan_ta_spps);
            }
            foreach ($asal->keuangan_ta_spp_rincis as $keuangan_ta_spp_rincis) {
                $isiankeuangan_ta_spp_rincis = Arr::except($keuangan_ta_spp_rincis->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_spp_rincis['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_spp_rincis()->create($isiankeuangan_ta_spp_rincis);
            }
            foreach ($asal->keuangan_ta_sppbuktis as $keuangan_ta_sppbuktis) {
                $isiankeuangan_ta_sppbuktis = Arr::except($keuangan_ta_sppbuktis->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_sppbuktis['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_sppbuktis()->create($isiankeuangan_ta_sppbuktis);
            }
            foreach ($asal->keuangan_ta_spppots as $keuangan_ta_spppots) {
                $isiankeuangan_ta_spppots = Arr::except($keuangan_ta_spppots->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_spppots['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_spppots()->create($isiankeuangan_ta_spppots);
            }
            foreach ($asal->keuangan_ta_sts as $keuangan_ta_sts) {
                $isiankeuangan_ta_sts = Arr::except($keuangan_ta_sts->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_sts['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_sts()->create($isiankeuangan_ta_sts);
            }
            foreach ($asal->keuangan_ta_sts_rincis as $keuangan_ta_sts_rincis) {
                $isiankeuangan_ta_sts_rincis = Arr::except($keuangan_ta_sts_rincis->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_sts_rincis['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_sts_rincis()->create($isiankeuangan_ta_sts_rincis);
            }
            foreach ($asal->keuangan_ta_tbps as $keuangan_ta_tbps) {
                $isiankeuangan_ta_tbps = Arr::except($keuangan_ta_tbps->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_tbps['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_tbps()->create($isiankeuangan_ta_tbps);
            }
            foreach ($asal->keuangan_ta_tbp_rincis as $keuangan_ta_tbp_rincis) {
                $isiankeuangan_ta_tbp_rincis = Arr::except($keuangan_ta_tbp_rincis->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_tbp_rincis['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_tbp_rincis()->create($isiankeuangan_ta_tbp_rincis);
            }
            foreach ($asal->keuangan_ta_triwulans as $keuangan_ta_triwulans) {
                $isiankeuangan_ta_triwulans = Arr::except($keuangan_ta_triwulans->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_triwulans['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_triwulans()->create($isiankeuangan_ta_triwulans);
            }
            foreach ($asal->keuangan_ta_triwulan_rincis as $keuangan_ta_triwulan_rincis) {
                $isiankeuangan_ta_triwulan_rincis = Arr::except($keuangan_ta_triwulan_rincis->toArray(), ['id', 'id_keuangan_master']);
                $isiankeuangan_ta_triwulan_rincis['id_keuangan_master'] = $hasilTujuanKeuanganMaster->id;
                $asalnya['config_id'] = $setConfigId;
                $hasilTujuanKeuanganMaster->keuangan_ta_triwulan_rincis()->create($isiankeuangan_ta_triwulan_rincis);
            }
        }
    }
}
