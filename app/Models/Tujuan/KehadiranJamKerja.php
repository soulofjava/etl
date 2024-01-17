<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KehadiranJamKerja
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama_hari
 * @property Carbon $jam_masuk
 * @property Carbon $jam_keluar
 * @property bool $status
 * @property string|null $keterangan
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class KehadiranJamKerja extends Model
{
	protected $table = 'kehadiran_jam_kerja';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'jam_masuk' => 'datetime',
		'jam_keluar' => 'datetime',
		'status' => 'bool'
	];

	protected $fillable = [
		'config_id',
		'nama_hari',
		'jam_masuk',
		'jam_keluar',
		'status',
		'keterangan'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
