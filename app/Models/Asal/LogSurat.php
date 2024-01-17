<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LogSurat
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_format_surat
 * @property int|null $id_pend
 * @property int $id_pamong
 * @property string|null $nama_pamong
 * @property string|null $nama_jabatan
 * @property int $id_user
 * @property Carbon $tanggal
 * @property string|null $bulan
 * @property string|null $tahun
 * @property string|null $no_surat
 * @property string|null $nama_surat
 * @property string|null $lampiran
 * @property float|null $nik_non_warga
 * @property string|null $nama_non_warga
 * @property string|null $keterangan
 * @property string|null $lokasi_arsip
 * @property int|null $urls_id
 * @property int $status
 * @property string|null $log_verifikasi
 * @property bool|null $tte
 * @property bool|null $verifikasi_operator
 * @property bool|null $verifikasi_kades
 * @property bool|null $verifikasi_sekdes
 * @property string|null $isi_surat
 * @property bool $kecamatan
 * @property string|null $deleted_at
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class LogSurat extends Model
{
	use SoftDeletes;
	protected $table = 'log_surat';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_format_surat' => 'int',
		'id_pend' => 'int',
		'id_pamong' => 'int',
		'id_user' => 'int',
		'tanggal' => 'datetime',
		'nik_non_warga' => 'float',
		'urls_id' => 'int',
		'status' => 'int',
		'tte' => 'bool',
		'verifikasi_operator' => 'bool',
		'verifikasi_kades' => 'bool',
		'verifikasi_sekdes' => 'bool',
		'kecamatan' => 'bool'
	];

	protected $fillable = [
		'config_id',
		'id_format_surat',
		'id_pend',
		'id_pamong',
		'nama_pamong',
		'nama_jabatan',
		'id_user',
		'tanggal',
		'bulan',
		'tahun',
		'no_surat',
		'nama_surat',
		'lampiran',
		'nik_non_warga',
		'nama_non_warga',
		'keterangan',
		'lokasi_arsip',
		'urls_id',
		'status',
		'log_verifikasi',
		'tte',
		'verifikasi_operator',
		'verifikasi_kades',
		'verifikasi_sekdes',
		'isi_surat',
		'kecamatan'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
