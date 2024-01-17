<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganMaster
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $versi_database
 * @property string $tahun_anggaran
 * @property int $aktif
 * @property Carbon $tanggal_impor
 * 
 * @property Config|null $config
 * @property Collection|KeuanganRefBankDesa[] $keuangan_ref_bank_desas
 * @property Collection|KeuanganRefBelOperasional[] $keuangan_ref_bel_operasionals
 * @property Collection|KeuanganRefBidang[] $keuangan_ref_bidangs
 * @property Collection|KeuanganRefBunga[] $keuangan_ref_bungas
 * @property Collection|KeuanganRefDesa[] $keuangan_ref_desas
 * @property Collection|KeuanganRefKecamatan[] $keuangan_ref_kecamatans
 * @property Collection|KeuanganRefKegiatan[] $keuangan_ref_kegiatans
 * @property Collection|KeuanganRefKorolari[] $keuangan_ref_korolaris
 * @property Collection|KeuanganRefNeracaClose[] $keuangan_ref_neraca_closes
 * @property Collection|KeuanganRefPerangkat[] $keuangan_ref_perangkats
 * @property Collection|KeuanganRefPotongan[] $keuangan_ref_potongans
 * @property Collection|KeuanganRefRek1[] $keuangan_ref_rek1s
 * @property Collection|KeuanganRefRek2[] $keuangan_ref_rek2s
 * @property Collection|KeuanganRefRek3[] $keuangan_ref_rek3s
 * @property Collection|KeuanganRefRek4[] $keuangan_ref_rek4s
 * @property Collection|KeuanganRefSbu[] $keuangan_ref_sbus
 * @property Collection|KeuanganRefSumber[] $keuangan_ref_sumbers
 * @property Collection|KeuanganTaAnggaran[] $keuangan_ta_anggarans
 * @property Collection|KeuanganTaAnggaranLog[] $keuangan_ta_anggaran_logs
 * @property Collection|KeuanganTaAnggaranRinci[] $keuangan_ta_anggaran_rincis
 * @property Collection|KeuanganTaBidang[] $keuangan_ta_bidangs
 * @property Collection|KeuanganTaDesa[] $keuangan_ta_desas
 * @property Collection|KeuanganTaJurnalUmum[] $keuangan_ta_jurnal_umums
 * @property Collection|KeuanganTaJurnalUmumRinci[] $keuangan_ta_jurnal_umum_rincis
 * @property Collection|KeuanganTaKegiatan[] $keuangan_ta_kegiatans
 * @property Collection|KeuanganTaMutasi[] $keuangan_ta_mutasis
 * @property Collection|KeuanganTaPajak[] $keuangan_ta_pajaks
 * @property Collection|KeuanganTaPajakRinci[] $keuangan_ta_pajak_rincis
 * @property Collection|KeuanganTaPemda[] $keuangan_ta_pemdas
 * @property Collection|KeuanganTaPencairan[] $keuangan_ta_pencairans
 * @property Collection|KeuanganTaPerangkat[] $keuangan_ta_perangkats
 * @property Collection|KeuanganTaRab[] $keuangan_ta_rabs
 * @property Collection|KeuanganTaRabRinci[] $keuangan_ta_rab_rincis
 * @property Collection|KeuanganTaRabSub[] $keuangan_ta_rab_subs
 * @property Collection|KeuanganTaRpjmBidang[] $keuangan_ta_rpjm_bidangs
 * @property Collection|KeuanganTaRpjmKegiatan[] $keuangan_ta_rpjm_kegiatans
 * @property Collection|KeuanganTaRpjmMisi[] $keuangan_ta_rpjm_misis
 * @property Collection|KeuanganTaRpjmPaguIndikatif[] $keuangan_ta_rpjm_pagu_indikatifs
 * @property Collection|KeuanganTaRpjmPaguTahunan[] $keuangan_ta_rpjm_pagu_tahunans
 * @property Collection|KeuanganTaRpjmSasaran[] $keuangan_ta_rpjm_sasarans
 * @property Collection|KeuanganTaRpjmTujuan[] $keuangan_ta_rpjm_tujuans
 * @property Collection|KeuanganTaRpjmVisi[] $keuangan_ta_rpjm_visis
 * @property Collection|KeuanganTaSaldoAwal[] $keuangan_ta_saldo_awals
 * @property Collection|KeuanganTaSpj[] $keuangan_ta_spjs
 * @property Collection|KeuanganTaSpjBukti[] $keuangan_ta_spj_buktis
 * @property Collection|KeuanganTaSpjRinci[] $keuangan_ta_spj_rincis
 * @property Collection|KeuanganTaSpjSisa[] $keuangan_ta_spj_sisas
 * @property Collection|KeuanganTaSpjpot[] $keuangan_ta_spjpots
 * @property Collection|KeuanganTaSpp[] $keuangan_ta_spps
 * @property Collection|KeuanganTaSppRinci[] $keuangan_ta_spp_rincis
 * @property Collection|KeuanganTaSppbukti[] $keuangan_ta_sppbuktis
 * @property Collection|KeuanganTaSpppot[] $keuangan_ta_spppots
 * @property Collection|KeuanganTaSt[] $keuangan_ta_sts
 * @property Collection|KeuanganTaStsRinci[] $keuangan_ta_sts_rincis
 * @property Collection|KeuanganTaTbp[] $keuangan_ta_tbps
 * @property Collection|KeuanganTaTbpRinci[] $keuangan_ta_tbp_rincis
 * @property Collection|KeuanganTaTriwulan[] $keuangan_ta_triwulans
 * @property Collection|KeuanganTaTriwulanRinci[] $keuangan_ta_triwulan_rincis
 *
 * @package App\Models
 */
class KeuanganMaster extends Model
{
	protected $table = 'keuangan_master';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'aktif' => 'int',
		'tanggal_impor' => 'datetime'
	];

	protected $fillable = [
		'config_id',
		'versi_database',
		'tahun_anggaran',
		'aktif',
		'tanggal_impor'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function keuangan_ref_bank_desas()
	{
		return $this->hasMany(KeuanganRefBankDesa::class, 'id_keuangan_master');
	}

	public function keuangan_ref_bel_operasionals()
	{
		return $this->hasMany(KeuanganRefBelOperasional::class, 'id_keuangan_master');
	}

	public function keuangan_ref_bidangs()
	{
		return $this->hasMany(KeuanganRefBidang::class, 'id_keuangan_master');
	}

	public function keuangan_ref_bungas()
	{
		return $this->hasMany(KeuanganRefBunga::class, 'id_keuangan_master');
	}

	public function keuangan_ref_desas()
	{
		return $this->hasMany(KeuanganRefDesa::class, 'id_keuangan_master');
	}

	public function keuangan_ref_kecamatans()
	{
		return $this->hasMany(KeuanganRefKecamatan::class, 'id_keuangan_master');
	}

	public function keuangan_ref_kegiatans()
	{
		return $this->hasMany(KeuanganRefKegiatan::class, 'id_keuangan_master');
	}

	public function keuangan_ref_korolaris()
	{
		return $this->hasMany(KeuanganRefKorolari::class, 'id_keuangan_master');
	}

	public function keuangan_ref_neraca_closes()
	{
		return $this->hasMany(KeuanganRefNeracaClose::class, 'id_keuangan_master');
	}

	public function keuangan_ref_perangkats()
	{
		return $this->hasMany(KeuanganRefPerangkat::class, 'id_keuangan_master');
	}

	public function keuangan_ref_potongans()
	{
		return $this->hasMany(KeuanganRefPotongan::class, 'id_keuangan_master');
	}

	public function keuangan_ref_rek1s()
	{
		return $this->hasMany(KeuanganRefRek1::class, 'id_keuangan_master');
	}

	public function keuangan_ref_rek2s()
	{
		return $this->hasMany(KeuanganRefRek2::class, 'id_keuangan_master');
	}

	public function keuangan_ref_rek3s()
	{
		return $this->hasMany(KeuanganRefRek3::class, 'id_keuangan_master');
	}

	public function keuangan_ref_rek4s()
	{
		return $this->hasMany(KeuanganRefRek4::class, 'id_keuangan_master');
	}

	public function keuangan_ref_sbus()
	{
		return $this->hasMany(KeuanganRefSbu::class, 'id_keuangan_master');
	}

	public function keuangan_ref_sumbers()
	{
		return $this->hasMany(KeuanganRefSumber::class, 'id_keuangan_master');
	}

	public function keuangan_ta_anggarans()
	{
		return $this->hasMany(KeuanganTaAnggaran::class, 'id_keuangan_master');
	}

	public function keuangan_ta_anggaran_logs()
	{
		return $this->hasMany(KeuanganTaAnggaranLog::class, 'id_keuangan_master');
	}

	public function keuangan_ta_anggaran_rincis()
	{
		return $this->hasMany(KeuanganTaAnggaranRinci::class, 'id_keuangan_master');
	}

	public function keuangan_ta_bidangs()
	{
		return $this->hasMany(KeuanganTaBidang::class, 'id_keuangan_master');
	}

	public function keuangan_ta_desas()
	{
		return $this->hasMany(KeuanganTaDesa::class, 'id_keuangan_master');
	}

	public function keuangan_ta_jurnal_umums()
	{
		return $this->hasMany(KeuanganTaJurnalUmum::class, 'id_keuangan_master');
	}

	public function keuangan_ta_jurnal_umum_rincis()
	{
		return $this->hasMany(KeuanganTaJurnalUmumRinci::class, 'id_keuangan_master');
	}

	public function keuangan_ta_kegiatans()
	{
		return $this->hasMany(KeuanganTaKegiatan::class, 'id_keuangan_master');
	}

	public function keuangan_ta_mutasis()
	{
		return $this->hasMany(KeuanganTaMutasi::class, 'id_keuangan_master');
	}

	public function keuangan_ta_pajaks()
	{
		return $this->hasMany(KeuanganTaPajak::class, 'id_keuangan_master');
	}

	public function keuangan_ta_pajak_rincis()
	{
		return $this->hasMany(KeuanganTaPajakRinci::class, 'id_keuangan_master');
	}

	public function keuangan_ta_pemdas()
	{
		return $this->hasMany(KeuanganTaPemda::class, 'id_keuangan_master');
	}

	public function keuangan_ta_pencairans()
	{
		return $this->hasMany(KeuanganTaPencairan::class, 'id_keuangan_master');
	}

	public function keuangan_ta_perangkats()
	{
		return $this->hasMany(KeuanganTaPerangkat::class, 'id_keuangan_master');
	}

	public function keuangan_ta_rabs()
	{
		return $this->hasMany(KeuanganTaRab::class, 'id_keuangan_master');
	}

	public function keuangan_ta_rab_rincis()
	{
		return $this->hasMany(KeuanganTaRabRinci::class, 'id_keuangan_master');
	}

	public function keuangan_ta_rab_subs()
	{
		return $this->hasMany(KeuanganTaRabSub::class, 'id_keuangan_master');
	}

	public function keuangan_ta_rpjm_bidangs()
	{
		return $this->hasMany(KeuanganTaRpjmBidang::class, 'id_keuangan_master');
	}

	public function keuangan_ta_rpjm_kegiatans()
	{
		return $this->hasMany(KeuanganTaRpjmKegiatan::class, 'id_keuangan_master');
	}

	public function keuangan_ta_rpjm_misis()
	{
		return $this->hasMany(KeuanganTaRpjmMisi::class, 'id_keuangan_master');
	}

	public function keuangan_ta_rpjm_pagu_indikatifs()
	{
		return $this->hasMany(KeuanganTaRpjmPaguIndikatif::class, 'id_keuangan_master');
	}

	public function keuangan_ta_rpjm_pagu_tahunans()
	{
		return $this->hasMany(KeuanganTaRpjmPaguTahunan::class, 'id_keuangan_master');
	}

	public function keuangan_ta_rpjm_sasarans()
	{
		return $this->hasMany(KeuanganTaRpjmSasaran::class, 'id_keuangan_master');
	}

	public function keuangan_ta_rpjm_tujuans()
	{
		return $this->hasMany(KeuanganTaRpjmTujuan::class, 'id_keuangan_master');
	}

	public function keuangan_ta_rpjm_visis()
	{
		return $this->hasMany(KeuanganTaRpjmVisi::class, 'id_keuangan_master');
	}

	public function keuangan_ta_saldo_awals()
	{
		return $this->hasMany(KeuanganTaSaldoAwal::class, 'id_keuangan_master');
	}

	public function keuangan_ta_spjs()
	{
		return $this->hasMany(KeuanganTaSpj::class, 'id_keuangan_master');
	}

	public function keuangan_ta_spj_buktis()
	{
		return $this->hasMany(KeuanganTaSpjBukti::class, 'id_keuangan_master');
	}

	public function keuangan_ta_spj_rincis()
	{
		return $this->hasMany(KeuanganTaSpjRinci::class, 'id_keuangan_master');
	}

	public function keuangan_ta_spj_sisas()
	{
		return $this->hasMany(KeuanganTaSpjSisa::class, 'id_keuangan_master');
	}

	public function keuangan_ta_spjpots()
	{
		return $this->hasMany(KeuanganTaSpjpot::class, 'id_keuangan_master');
	}

	public function keuangan_ta_spps()
	{
		return $this->hasMany(KeuanganTaSpp::class, 'id_keuangan_master');
	}

	public function keuangan_ta_spp_rincis()
	{
		return $this->hasMany(KeuanganTaSppRinci::class, 'id_keuangan_master');
	}

	public function keuangan_ta_sppbuktis()
	{
		return $this->hasMany(KeuanganTaSppbukti::class, 'id_keuangan_master');
	}

	public function keuangan_ta_spppots()
	{
		return $this->hasMany(KeuanganTaSpppot::class, 'id_keuangan_master');
	}

	public function keuangan_ta_sts()
	{
		return $this->hasMany(KeuanganTaSt::class, 'id_keuangan_master');
	}

	public function keuangan_ta_sts_rincis()
	{
		return $this->hasMany(KeuanganTaStsRinci::class, 'id_keuangan_master');
	}

	public function keuangan_ta_tbps()
	{
		return $this->hasMany(KeuanganTaTbp::class, 'id_keuangan_master');
	}

	public function keuangan_ta_tbp_rincis()
	{
		return $this->hasMany(KeuanganTaTbpRinci::class, 'id_keuangan_master');
	}

	public function keuangan_ta_triwulans()
	{
		return $this->hasMany(KeuanganTaTriwulan::class, 'id_keuangan_master');
	}

	public function keuangan_ta_triwulan_rincis()
	{
		return $this->hasMany(KeuanganTaTriwulanRinci::class, 'id_keuangan_master');
	}
}
