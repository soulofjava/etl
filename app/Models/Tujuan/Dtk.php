<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dtk
 * 
 * @property int $id
 * @property int|null $config_id
 * @property bool $is_draft
 * @property int|null $id_rtm
 * @property int|null $id_keluarga
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $versi_kuisioner
 * @property string|null $catatan
 * @property string|null $kode_provinsi
 * @property string|null $kode_kabupaten
 * @property string|null $kode_kecamatan
 * @property string|null $kode_desa
 * @property string|null $kode_sls_non_sls
 * @property string|null $kode_sub_sls
 * @property string|null $nama_sls_non_sls
 * @property string|null $no_urut_bangunan_tinggal
 * @property string|null $no_urut_keluarga_verif
 * @property string|null $status_keluarga
 * @property string|null $kode_landmark_wilkerstat
 * @property string|null $kd_kk
 * @property string|null $no_urut_ruta
 * @property Carbon|null $tanggal_pencacahan
 * @property string|null $nama_petugas_pencacahan
 * @property string|null $kode_petugas_pencacahan
 * @property Carbon|null $tanggal_pemeriksaan
 * @property string|null $nama_pemeriksa
 * @property string|null $kode_pemeriksa
 * @property string|null $nama_responden
 * @property string|null $kd_hasil_pencacahan_ruta
 * @property Carbon|null $tanggal_pendataan
 * @property string|null $nama_ppl
 * @property string|null $kode_ppl
 * @property string|null $nama_pml
 * @property string|null $kode_pml
 * @property string|null $kd_hasil_pendataan_keluarga
 * @property string|null $no_hp_responden
 * @property string|null $kd_stat_bangunan_tinggal
 * @property string|null $kd_stat_lahan_tinggal
 * @property string|null $kd_sertiv_lahan_milik
 * @property int|null $luas_lantai
 * @property string|null $kd_jenis_lantai_terluas
 * @property string|null $kd_jenis_dinding
 * @property string|null $kd_kondisi_dinding
 * @property string|null $kd_jenis_atap
 * @property string|null $kd_kondisi_atap
 * @property string|null $jumlah_kamar_tidur
 * @property string|null $kd_sumber_air_minum
 * @property string|null $kd_jarak_sumber_air_ke_tpl
 * @property string|null $kd_memperoleh_air_minum
 * @property string|null $kd_sumber_penerangan_utama
 * @property string|null $kd_daya_terpasang
 * @property string|null $kd_daya_terpasang2
 * @property string|null $kd_daya_terpasang3
 * @property string|null $kode_pelanggan_daya
 * @property string|null $kd_bahan_bakar_memasak
 * @property string|null $kd_fasilitas_tempat_bab
 * @property string|null $kd_jenis_kloset
 * @property string|null $kd_pembuangan_akhir_tinja
 * @property string|null $kd_tabung_gas_3_kg
 * @property string|null $kd_tabung_gas_5_5_kg
 * @property string|null $kd_tabung_gas_12_kg
 * @property string|null $kd_lemari_es
 * @property string|null $kd_ac
 * @property string|null $kd_pemanas_air
 * @property string|null $kd_telepon_rumah
 * @property string|null $kd_televisi
 * @property string|null $kd_perhiasan_10_gr_emas
 * @property string|null $kd_rek_aktif
 * @property string|null $kd_komputer_laptop
 * @property string|null $kd_sepeda_motor
 * @property string|null $kd_mobil
 * @property string|null $kd_perahu
 * @property string|null $kd_kapal_perahu_motor
 * @property string|null $kd_featured_phone
 * @property string|null $kd_smartphone
 * @property string|null $kd_sepeda
 * @property string|null $kd_lahan
 * @property int|null $luas_lahan
 * @property string|null $kd_ada_sertiv_lahan
 * @property string|null $kd_rumah_ditempat_lain
 * @property int|null $jumlah_sapi
 * @property int|null $jumlah_kerbau
 * @property int|null $jumlah_kuda
 * @property int|null $jumlah_babi
 * @property int|null $jumlah_kambing_domba
 * @property int|null $jumlah_unggas
 * @property int|null $jumlah_ikan
 * @property int|null $jumlah_lainnya
 * @property string|null $kd_ada_art_usaha_sendiri_bersama
 * @property string|null $kd_internet_sebulan
 * @property string|null $kd_pengeluaran_pulsa_dan_data
 * @property string|null $kd_ada_art_lanjut_usia
 * @property string|null $kd_bss_bnpt
 * @property string|null $bulan_bss_bnpt
 * @property Carbon|null $tahun_bss_bnpt
 * @property string|null $kd_pkh
 * @property string|null $bulan_pkh
 * @property Carbon|null $tahun_pkh
 * @property string|null $kd_bst_covid19
 * @property string|null $bulan_bst_covid19
 * @property Carbon|null $tahun_bst_covid19
 * @property string|null $kd_blt_dana_desa
 * @property string|null $bulan_blt_dana_desa
 * @property Carbon|null $tahun_blt_dana_desa
 * @property string|null $kd_subsidi_listrik
 * @property string|null $bulan_subsidi_listrik
 * @property Carbon|null $tahun_subsidi_listrik
 * @property string|null $kd_asuransi_lain
 * @property string|null $bulan_asuransi_lain
 * @property Carbon|null $tahun_asuransi_lain
 * @property string|null $kd_bantuan_pemprov
 * @property string|null $bulan_bantuan_pemprov
 * @property Carbon|null $tahun_bantuan_pemprov
 * @property string|null $kd_bantuan_pemkabkot
 * @property string|null $bulan_bantuan_pemkabkot
 * @property Carbon|null $tahun_bantuan_pemkabkot
 * @property string|null $kd_bantuan_pemdes
 * @property string|null $bulan_bantuan_pemdes
 * @property Carbon|null $tahun_bantuan_pemdes
 * @property string|null $kd_bantuan_pemda
 * @property string|null $bulan_bantuan_pemda
 * @property Carbon|null $tahun_bantuan_pemda
 * @property string|null $kd_bantuan_masyarakat
 * @property string|null $bulan_bantuan_masyarakat
 * @property Carbon|null $tahun_bantuan_masyarakat
 * @property string|null $kd_subsidi_pupuk
 * @property string|null $bulan_subsidi_pupuk
 * @property Carbon|null $tahun_subsidi_pupuk
 * @property string|null $kd_subsidi_lpg
 * @property string|null $bulan_subsidi_lpg
 * @property Carbon|null $tahun_subsidi_lpg
 * @property string|null $kd_konsumsi_daging
 * @property string|null $kd_makan
 * @property string|null $kd_beli_pakaian_baru
 * @property string|null $kd_bayar_biaya_pengobatan
 * @property string|null $kd_bahasa_wawancara
 * @property string|null $tulis_bahasa_daerah
 * 
 * @property TwebRtm|null $tweb_rtm
 * @property TwebKeluarga|null $tweb_keluarga
 * @property Config|null $config
 * @property Collection|DtksAnggotum[] $dtks_anggota
 * @property Collection|DtksRefLampiran[] $dtks_ref_lampirans
 *
 * @package App\Models
 */
class Dtk extends Model
{
	protected $table = 'dtks';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'is_draft' => 'bool',
		'id_rtm' => 'int',
		'id_keluarga' => 'int',
		'tanggal_pencacahan' => 'datetime',
		'tanggal_pemeriksaan' => 'datetime',
		'tanggal_pendataan' => 'datetime',
		'luas_lantai' => 'int',
		'luas_lahan' => 'int',
		'jumlah_sapi' => 'int',
		'jumlah_kerbau' => 'int',
		'jumlah_kuda' => 'int',
		'jumlah_babi' => 'int',
		'jumlah_kambing_domba' => 'int',
		'jumlah_unggas' => 'int',
		'jumlah_ikan' => 'int',
		'jumlah_lainnya' => 'int',
		'tahun_bss_bnpt' => 'string',
		'tahun_pkh' => 'string',
		'tahun_bst_covid19' => 'string',
		'tahun_blt_dana_desa' => 'string',
		'tahun_subsidi_listrik' => 'string',
		'tahun_asuransi_lain' => 'string',
		'tahun_bantuan_pemprov' => 'string',
		'tahun_bantuan_pemkabkot' => 'string',
		'tahun_bantuan_pemdes' => 'string',
		'tahun_bantuan_pemda' => 'string',
		'tahun_bantuan_masyarakat' => 'string',
		'tahun_subsidi_pupuk' => 'string',
		'tahun_subsidi_lpg' => 'string'
	];

	protected $fillable = [
		'config_id',
		'is_draft',
		'id_rtm',
		'id_keluarga',
		'versi_kuisioner',
		'catatan',
		'kode_provinsi',
		'kode_kabupaten',
		'kode_kecamatan',
		'kode_desa',
		'kode_sls_non_sls',
		'kode_sub_sls',
		'nama_sls_non_sls',
		'no_urut_bangunan_tinggal',
		'no_urut_keluarga_verif',
		'status_keluarga',
		'kode_landmark_wilkerstat',
		'kd_kk',
		'no_urut_ruta',
		'tanggal_pencacahan',
		'nama_petugas_pencacahan',
		'kode_petugas_pencacahan',
		'tanggal_pemeriksaan',
		'nama_pemeriksa',
		'kode_pemeriksa',
		'nama_responden',
		'kd_hasil_pencacahan_ruta',
		'tanggal_pendataan',
		'nama_ppl',
		'kode_ppl',
		'nama_pml',
		'kode_pml',
		'kd_hasil_pendataan_keluarga',
		'no_hp_responden',
		'kd_stat_bangunan_tinggal',
		'kd_stat_lahan_tinggal',
		'kd_sertiv_lahan_milik',
		'luas_lantai',
		'kd_jenis_lantai_terluas',
		'kd_jenis_dinding',
		'kd_kondisi_dinding',
		'kd_jenis_atap',
		'kd_kondisi_atap',
		'jumlah_kamar_tidur',
		'kd_sumber_air_minum',
		'kd_jarak_sumber_air_ke_tpl',
		'kd_memperoleh_air_minum',
		'kd_sumber_penerangan_utama',
		'kd_daya_terpasang',
		'kd_daya_terpasang2',
		'kd_daya_terpasang3',
		'kode_pelanggan_daya',
		'kd_bahan_bakar_memasak',
		'kd_fasilitas_tempat_bab',
		'kd_jenis_kloset',
		'kd_pembuangan_akhir_tinja',
		'kd_tabung_gas_3_kg',
		'kd_tabung_gas_5_5_kg',
		'kd_tabung_gas_12_kg',
		'kd_lemari_es',
		'kd_ac',
		'kd_pemanas_air',
		'kd_telepon_rumah',
		'kd_televisi',
		'kd_perhiasan_10_gr_emas',
		'kd_rek_aktif',
		'kd_komputer_laptop',
		'kd_sepeda_motor',
		'kd_mobil',
		'kd_perahu',
		'kd_kapal_perahu_motor',
		'kd_featured_phone',
		'kd_smartphone',
		'kd_sepeda',
		'kd_lahan',
		'luas_lahan',
		'kd_ada_sertiv_lahan',
		'kd_rumah_ditempat_lain',
		'jumlah_sapi',
		'jumlah_kerbau',
		'jumlah_kuda',
		'jumlah_babi',
		'jumlah_kambing_domba',
		'jumlah_unggas',
		'jumlah_ikan',
		'jumlah_lainnya',
		'kd_ada_art_usaha_sendiri_bersama',
		'kd_internet_sebulan',
		'kd_pengeluaran_pulsa_dan_data',
		'kd_ada_art_lanjut_usia',
		'kd_bss_bnpt',
		'bulan_bss_bnpt',
		'tahun_bss_bnpt',
		'kd_pkh',
		'bulan_pkh',
		'tahun_pkh',
		'kd_bst_covid19',
		'bulan_bst_covid19',
		'tahun_bst_covid19',
		'kd_blt_dana_desa',
		'bulan_blt_dana_desa',
		'tahun_blt_dana_desa',
		'kd_subsidi_listrik',
		'bulan_subsidi_listrik',
		'tahun_subsidi_listrik',
		'kd_asuransi_lain',
		'bulan_asuransi_lain',
		'tahun_asuransi_lain',
		'kd_bantuan_pemprov',
		'bulan_bantuan_pemprov',
		'tahun_bantuan_pemprov',
		'kd_bantuan_pemkabkot',
		'bulan_bantuan_pemkabkot',
		'tahun_bantuan_pemkabkot',
		'kd_bantuan_pemdes',
		'bulan_bantuan_pemdes',
		'tahun_bantuan_pemdes',
		'kd_bantuan_pemda',
		'bulan_bantuan_pemda',
		'tahun_bantuan_pemda',
		'kd_bantuan_masyarakat',
		'bulan_bantuan_masyarakat',
		'tahun_bantuan_masyarakat',
		'kd_subsidi_pupuk',
		'bulan_subsidi_pupuk',
		'tahun_subsidi_pupuk',
		'kd_subsidi_lpg',
		'bulan_subsidi_lpg',
		'tahun_subsidi_lpg',
		'kd_konsumsi_daging',
		'kd_makan',
		'kd_beli_pakaian_baru',
		'kd_bayar_biaya_pengobatan',
		'kd_bahasa_wawancara',
		'tulis_bahasa_daerah'
	];

	public function tweb_rtm()
	{
		return $this->belongsTo(TwebRtm::class, 'id_rtm');
	}

	public function tweb_keluarga()
	{
		return $this->belongsTo(TwebKeluarga::class, 'id_keluarga');
	}

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function dtks_anggota()
	{
		return $this->hasMany(DtksAnggotum::class, 'id_dtks');
	}

	public function dtks_ref_lampirans()
	{
		return $this->hasMany(DtksRefLampiran::class, 'id_dtks');
	}
}
