<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KehadiranHariLibur
 * 
 * @property int $id
 * @property int|null $config_id
 * @property Carbon $tanggal
 * @property string|null $keterangan
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class KehadiranHariLibur extends Model
{
	protected $table = 'kehadiran_hari_libur';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'tanggal' => 'datetime'
	];

	protected $fillable = [
		'config_id',
		'tanggal',
		'keterangan'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
