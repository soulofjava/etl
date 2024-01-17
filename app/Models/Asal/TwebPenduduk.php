<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebPenduduk
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama
 * @property string|null $nik
 * @property int|null $id_kk
 * @property int|null $kk_level
 * @property string|null $id_rtm
 * @property int|null $rtm_level
 * @property int|null $sex
 * @property string|null $tempatlahir
 * @property Carbon|null $tanggallahir
 * @property int|null $agama_id
 * @property int|null $pendidikan_kk_id
 * @property int|null $pendidikan_sedang_id
 * @property int|null $pekerjaan_id
 * @property int|null $status_kawin
 * @property int $warganegara_id
 * @property string|null $dokumen_pasport
 * @property string|null $dokumen_kitas
 * @property string|null $ayah_nik
 * @property string|null $ibu_nik
 * @property string|null $nama_ayah
 * @property string|null $nama_ibu
 * @property string|null $foto
 * @property int|null $golongan_darah_id
 * @property int $id_cluster
 * @property int|null $status
 * @property string|null $alamat_sebelumnya
 * @property string|null $alamat_sekarang
 * @property int $status_dasar
 * @property int|null $hamil
 * @property int|null $cacat_id
 * @property int|null $sakit_menahun_id
 * @property string|null $akta_lahir
 * @property string|null $akta_perkawinan
 * @property Carbon|null $tanggalperkawinan
 * @property string|null $akta_perceraian
 * @property Carbon|null $tanggalperceraian
 * @property int|null $cara_kb_id
 * @property string|null $telepon
 * @property Carbon|null $tanggal_akhir_paspor
 * @property string|null $no_kk_sebelumnya
 * @property int|null $ktp_el
 * @property int|null $status_rekam
 * @property string|null $waktu_lahir
 * @property int|null $tempat_dilahirkan
 * @property int|null $jenis_kelahiran
 * @property int|null $kelahiran_anak_ke
 * @property int|null $penolong_kelahiran
 * @property int|null $berat_lahir
 * @property string|null $panjang_lahir
 * @property string|null $tag_id_card
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property int|null $updated_by
 * @property int|null $id_asuransi
 * @property string|null $no_asuransi
 * @property string|null $email
 * @property string|null $email_token
 * @property Carbon|null $email_tgl_kadaluarsa
 * @property Carbon|null $email_tgl_verifikasi
 * @property string|null $telegram
 * @property string|null $telegram_token
 * @property Carbon|null $telegram_tgl_kadaluarsa
 * @property Carbon|null $telegram_tgl_verifikasi
 * @property int|null $bahasa_id
 * @property string|null $ket
 * @property string|null $negara_asal
 * @property string|null $tempat_cetak_ktp
 * @property Carbon|null $tanggal_cetak_ktp
 * @property string|null $suku
 * @property string|null $bpjs_ketenagakerjaan
 * @property string|null $hubung_warga
 * 
 * @property Config|null $config
 * @property Collection|AnggotaGrupKontak[] $anggota_grup_kontaks
 * @property Collection|Covid19Pemudik[] $covid19_pemudiks
 * @property Collection|DtksAnggotum[] $dtks_anggota
 * @property Collection|KelompokAnggotum[] $kelompok_anggota
 * @property Collection|LogPenduduk[] $log_penduduks
 * @property TwebPendudukMandiri $tweb_penduduk_mandiri
 *
 * @package App\Models
 */
class TwebPenduduk extends Model
{
	protected $table = 'tweb_penduduk';

	protected $casts = [
		'config_id' => 'int',
		'id_kk' => 'int',
		'kk_level' => 'int',
		'rtm_level' => 'int',
		'sex' => 'int',
		'tanggallahir' => 'datetime',
		'agama_id' => 'int',
		'pendidikan_kk_id' => 'int',
		'pendidikan_sedang_id' => 'int',
		'pekerjaan_id' => 'int',
		'status_kawin' => 'int',
		'warganegara_id' => 'int',
		'golongan_darah_id' => 'int',
		'id_cluster' => 'int',
		'status' => 'int',
		'status_dasar' => 'int',
		'hamil' => 'int',
		'cacat_id' => 'int',
		'sakit_menahun_id' => 'int',
		'tanggalperkawinan' => 'datetime',
		'tanggalperceraian' => 'datetime',
		'cara_kb_id' => 'int',
		'tanggal_akhir_paspor' => 'datetime',
		'ktp_el' => 'int',
		'status_rekam' => 'int',
		'tempat_dilahirkan' => 'int',
		'jenis_kelahiran' => 'int',
		'kelahiran_anak_ke' => 'int',
		'penolong_kelahiran' => 'int',
		'berat_lahir' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'id_asuransi' => 'int',
		'email_tgl_kadaluarsa' => 'datetime',
		'email_tgl_verifikasi' => 'datetime',
		'telegram_tgl_kadaluarsa' => 'datetime',
		'telegram_tgl_verifikasi' => 'datetime',
		'bahasa_id' => 'int',
		'tanggal_cetak_ktp' => 'datetime'
	];

	protected $hidden = [
		'email_token',
		'telegram_token'
	];

	protected $fillable = [
		'config_id',
		'nama',
		'nik',
		'id_kk',
		'kk_level',
		'id_rtm',
		'rtm_level',
		'sex',
		'tempatlahir',
		'tanggallahir',
		'agama_id',
		'pendidikan_kk_id',
		'pendidikan_sedang_id',
		'pekerjaan_id',
		'status_kawin',
		'warganegara_id',
		'dokumen_pasport',
		'dokumen_kitas',
		'ayah_nik',
		'ibu_nik',
		'nama_ayah',
		'nama_ibu',
		'foto',
		'golongan_darah_id',
		'id_cluster',
		'status',
		'alamat_sebelumnya',
		'alamat_sekarang',
		'status_dasar',
		'hamil',
		'cacat_id',
		'sakit_menahun_id',
		'akta_lahir',
		'akta_perkawinan',
		'tanggalperkawinan',
		'akta_perceraian',
		'tanggalperceraian',
		'cara_kb_id',
		'telepon',
		'tanggal_akhir_paspor',
		'no_kk_sebelumnya',
		'ktp_el',
		'status_rekam',
		'waktu_lahir',
		'tempat_dilahirkan',
		'jenis_kelahiran',
		'kelahiran_anak_ke',
		'penolong_kelahiran',
		'berat_lahir',
		'panjang_lahir',
		'tag_id_card',
		'created_by',
		'updated_by',
		'id_asuransi',
		'no_asuransi',
		'email',
		'email_token',
		'email_tgl_kadaluarsa',
		'email_tgl_verifikasi',
		'telegram',
		'telegram_token',
		'telegram_tgl_kadaluarsa',
		'telegram_tgl_verifikasi',
		'bahasa_id',
		'ket',
		'negara_asal',
		'tempat_cetak_ktp',
		'tanggal_cetak_ktp',
		'suku',
		'bpjs_ketenagakerjaan',
		'hubung_warga'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function anggota_grup_kontaks()
	{
		return $this->hasMany(AnggotaGrupKontak::class, 'id_penduduk');
	}

	public function covid19_pemudiks()
	{
		return $this->hasMany(Covid19Pemudik::class, 'id_terdata');
	}

	public function dtks_anggota()
	{
		return $this->hasMany(DtksAnggotum::class, 'id_penduduk');
	}

	public function kelompok_anggota()
	{
		return $this->hasMany(KelompokAnggotum::class, 'id_penduduk');
	}

	public function log_penduduks()
	{
		return $this->hasMany(LogPenduduk::class, 'id_pend');
	}

	public function tweb_penduduk_mandiri()
	{
		return $this->hasOne(TwebPendudukMandiri::class, 'id_pend');
	}
}
