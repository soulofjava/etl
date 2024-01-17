<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KelompokAnggotum
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_kelompok
 * @property int $id_penduduk
 * @property string|null $no_anggota
 * @property string|null $keterangan
 * @property string|null $jabatan
 * @property string|null $no_sk_jabatan
 * @property string|null $tipe
 * @property string|null $periode
 * @property string|null $nmr_sk_pengangkatan
 * @property Carbon|null $tgl_sk_pengangkatan
 * @property string|null $nmr_sk_pemberhentian
 * @property Carbon|null $tgl_sk_pemberhentian
 * 
 * @property Config|null $config
 * @property Kelompok $kelompok
 * @property TwebPenduduk $tweb_penduduk
 *
 * @package App\Models
 */
class KelompokAnggotum extends Model
{
	protected $table = 'kelompok_anggota';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_kelompok' => 'int',
		'id_penduduk' => 'int',
		'tgl_sk_pengangkatan' => 'datetime',
		'tgl_sk_pemberhentian' => 'datetime'
	];

	protected $fillable = [
		'config_id',
		'id_kelompok',
		'id_penduduk',
		'no_anggota',
		'keterangan',
		'jabatan',
		'no_sk_jabatan',
		'tipe',
		'periode',
		'nmr_sk_pengangkatan',
		'tgl_sk_pengangkatan',
		'nmr_sk_pemberhentian',
		'tgl_sk_pemberhentian'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function kelompok()
	{
		return $this->belongsTo(Kelompok::class, 'id_kelompok');
	}

	public function tweb_penduduk()
	{
		return $this->belongsTo(TwebPenduduk::class, 'id_penduduk');
	}
}
