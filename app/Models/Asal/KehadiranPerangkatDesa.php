<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KehadiranPerangkatDesa
 * 
 * @property int $id
 * @property int|null $config_id
 * @property Carbon|null $tanggal
 * @property int|null $pamong_id
 * @property Carbon|null $jam_masuk
 * @property Carbon|null $jam_keluar
 * @property string|null $status_kehadiran
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class KehadiranPerangkatDesa extends Model
{
	protected $table = 'kehadiran_perangkat_desa';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'tanggal' => 'datetime',
		'pamong_id' => 'int',
		'jam_masuk' => 'datetime',
		'jam_keluar' => 'datetime'
	];

	protected $fillable = [
		'config_id',
		'tanggal',
		'pamong_id',
		'jam_masuk',
		'jam_keluar',
		'status_kehadiran'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
