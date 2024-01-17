<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KehadiranPengaduan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property Carbon $waktu
 * @property bool $status
 * @property string|null $keterangan
 * @property int $id_penduduk
 * @property int $id_pamong
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class KehadiranPengaduan extends Model
{
	protected $table = 'kehadiran_pengaduan';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'waktu' => 'datetime',
		'status' => 'bool',
		'id_penduduk' => 'int',
		'id_pamong' => 'int'
	];

	protected $fillable = [
		'config_id',
		'waktu',
		'status',
		'keterangan',
		'id_penduduk',
		'id_pamong'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
