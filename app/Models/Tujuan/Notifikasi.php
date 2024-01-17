<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notifikasi
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $kode
 * @property string $judul
 * @property string $jenis
 * @property string $isi
 * @property string $server
 * @property Carbon $tgl_berikutnya
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property int $frekuensi
 * @property string $aksi
 * @property int $aktif
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Notifikasi extends Model
{
	protected $table = 'notifikasi';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'tgl_berikutnya' => 'datetime',
		'updated_by' => 'int',
		'frekuensi' => 'int',
		'aktif' => 'int'
	];

	protected $fillable = [
		'config_id',
		'kode',
		'judul',
		'jenis',
		'isi',
		'server',
		'tgl_berikutnya',
		'updated_by',
		'frekuensi',
		'aksi',
		'aktif'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
