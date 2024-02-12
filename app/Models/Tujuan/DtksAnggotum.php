<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DtksAnggotum
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int|null $id_dtks
 * @property int|null $id_penduduk
 * @property int|null $id_keluarga
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $kd_ket_keberadaan_art
 * @property string|null $bulan_meninggal
 * @property Carbon|null $tahun_meninggal
 * @property string|null $kd_punya_akta_meniggal
 * @property string|null $bulan_pindah_tempat
 * @property Carbon|null $tahun_pindah_tempat
 * @property string|null $kd_tempat_tinggal_saat_ini
 * @property string|null $bulan_masuk_ruta
 * @property Carbon|null $tahun_masuk_ruta
 * @property string|null $kd_alasan_masuk_ruta
 * @property string|null $kd_hubungan_dg_krt
 * @property string|null $kd_hubungan_dg_kk
 * @property string|null $kd_jenis_kelamin
 * @property string|null $kd_punya_aktanikah_cerai
 * @property string|null $kd_punya_kartuid
 * @property string|null $kd_sulit_penglihatan
 * @property string|null $kd_sulit_pendengaran
 * @property string|null $kd_sulit_jalan_naiktangga
 * @property string|null $kd_sulit_gerak_tangan_jari
 * @property string|null $kd_sulit_belajar_intelektual
 * @property string|null $kd_sulit_ingat_konsentrasi
 * @property string|null $kd_sulit_perilaku_emosi
 * @property string|null $kd_sulit_paham_bicara_kom
 * @property string|null $kd_sulit_mandiri
 * @property string|null $kd_sering_sedih_depresi
 * @property string|null $kd_memiliki_perawat
 * @property string|null $kd_merokok_sebulan_akhir
 * @property string|null $kd_penyakit_kronis_menahun
 * @property string|null $kd_partisipasi_sekolah
 * @property string|null $kd_pendidikan_tertinggi
 * @property string|null $kd_kelas_tertinggi
 * @property string|null $kd_ijazah_tertinggi
 * @property string|null $kd_bekerja_seminggu_lalu
 * @property string|null $jumlah_jam_kerja_seminggu_lalu
 * @property int|null $pendapatan_sebulan_terakhir
 * @property string|null $kd_punya_npwp
 * @property string|null $npwp
 * @property string|null $kd_lapangan_usaha_pekerjaan
 * @property string|null $kd_kedudukan_di_pekerjaan
 * @property string|null $kd_gizi_seimbang
 * @property string|null $kd_imunasasi_lengkap
 * @property string|null $kd_bantuan_pempus
 * @property string|null $kd_bantuan_pemkot
 * @property string|null $kd_bantuan_pemdes
 * @property string|null $kd_jamkes_setahun
 * @property string|null $kd_ikut_pbijkn_bpjssehat
 * @property string|null $kd_ikut_bpjssehat_nonpbi
 * @property string|null $kd_ikut_jamsostek_bpjsk
 * @property string|null $kd_ikut_pip
 * @property string|null $kd_ikut_prakerja
 * @property string|null $kd_ikut_kur
 * @property string|null $kd_ikut_umi
 * @property string|null $jumlah_jamket_kerja
 * @property bool $is_usaha_sendiri_bersama
 * @property string|null $kd_punya_usaha_sendiri_bersama
 * @property int|null $jumlah_usaha_sendiri_bersama
 * @property string|null $kd_lapangan_usaha_dr_usaha
 * @property string $tulis_lapangan_usaha_dr_usaha
 * @property string $tulis_lapangan_usaha_pekerjaan
 * @property int|null $jumlah_pekerja_dibayar
 * @property int|null $jumlah_pekerja_tidak_dibayar
 * @property string|null $kd_kepemilikan_ijin_usaha
 * @property string|null $kd_omset_usaha_perbulan
 * @property string|null $kd_guna_internet_usaha
 * 
 * @property Dtk|null $dtk
 * @property TwebKeluarga|null $tweb_keluarga
 * @property TwebPenduduk|null $tweb_penduduk
 * @property Config|null $config
 *
 * @package App\Models
 */
class DtksAnggotum extends Model
{
	protected $table = 'dtks_anggota';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_dtks' => 'int',
		'id_penduduk' => 'int',
		'id_keluarga' => 'int',
		'tahun_meninggal' => 'datetime',
		'tahun_pindah_tempat' => 'datetime',
		'tahun_masuk_ruta' => 'datetime',
		'pendapatan_sebulan_terakhir' => 'int',
		'is_usaha_sendiri_bersama' => 'bool',
		'jumlah_usaha_sendiri_bersama' => 'int',
		'jumlah_pekerja_dibayar' => 'int',
		'jumlah_pekerja_tidak_dibayar' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_dtks',
		'id_penduduk',
		'id_keluarga',
		'kd_ket_keberadaan_art',
		'bulan_meninggal',
		'tahun_meninggal',
		'kd_punya_akta_meniggal',
		'bulan_pindah_tempat',
		'tahun_pindah_tempat',
		'kd_tempat_tinggal_saat_ini',
		'bulan_masuk_ruta',
		'tahun_masuk_ruta',
		'kd_alasan_masuk_ruta',
		'kd_hubungan_dg_krt',
		'kd_hubungan_dg_kk',
		'kd_jenis_kelamin',
		'kd_punya_aktanikah_cerai',
		'kd_punya_kartuid',
		'kd_sulit_penglihatan',
		'kd_sulit_pendengaran',
		'kd_sulit_jalan_naiktangga',
		'kd_sulit_gerak_tangan_jari',
		'kd_sulit_belajar_intelektual',
		'kd_sulit_ingat_konsentrasi',
		'kd_sulit_perilaku_emosi',
		'kd_sulit_paham_bicara_kom',
		'kd_sulit_mandiri',
		'kd_sering_sedih_depresi',
		'kd_memiliki_perawat',
		'kd_merokok_sebulan_akhir',
		'kd_penyakit_kronis_menahun',
		'kd_partisipasi_sekolah',
		'kd_pendidikan_tertinggi',
		'kd_kelas_tertinggi',
		'kd_ijazah_tertinggi',
		'kd_bekerja_seminggu_lalu',
		'jumlah_jam_kerja_seminggu_lalu',
		'pendapatan_sebulan_terakhir',
		'kd_punya_npwp',
		'npwp',
		'kd_lapangan_usaha_pekerjaan',
		'kd_kedudukan_di_pekerjaan',
		'kd_gizi_seimbang',
		'kd_imunasasi_lengkap',
		'kd_bantuan_pempus',
		'kd_bantuan_pemkot',
		'kd_bantuan_pemdes',
		'kd_jamkes_setahun',
		'kd_ikut_pbijkn_bpjssehat',
		'kd_ikut_bpjssehat_nonpbi',
		'kd_ikut_jamsostek_bpjsk',
		'kd_ikut_pip',
		'kd_ikut_prakerja',
		'kd_ikut_kur',
		'kd_ikut_umi',
		'jumlah_jamket_kerja',
		'is_usaha_sendiri_bersama',
		'kd_punya_usaha_sendiri_bersama',
		'jumlah_usaha_sendiri_bersama',
		'kd_lapangan_usaha_dr_usaha',
		'tulis_lapangan_usaha_dr_usaha',
		'tulis_lapangan_usaha_pekerjaan',
		'jumlah_pekerja_dibayar',
		'jumlah_pekerja_tidak_dibayar',
		'kd_kepemilikan_ijin_usaha',
		'kd_omset_usaha_perbulan',
		'kd_guna_internet_usaha'
	];

	public function dtk()
	{
		return $this->belongsTo(Dtk::class, 'id_dtks');
	}

	public function tweb_keluarga()
	{
		return $this->belongsTo(TwebKeluarga::class, 'id_keluarga');
	}

	public function tweb_penduduk()
	{
		return $this->belongsTo(TwebPenduduk::class, 'id_penduduk');
	}

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
