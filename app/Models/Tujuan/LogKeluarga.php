<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogKeluarga
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_kk
 * @property int $id_peristiwa
 * @property Carbon $tgl_peristiwa
 * @property int|null $id_pend
 * @property int|null $updated_by
 * @property int|null $id_log_penduduk
 * 
 * @property Config|null $config
 * @property LogPenduduk|null $log_penduduk
 *
 * @package App\Models
 */
class LogKeluarga extends Model
{
	protected $table = 'log_keluarga';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_kk' => 'int',
		'id_peristiwa' => 'int',
		'tgl_peristiwa' => 'datetime',
		'id_pend' => 'int',
		'updated_by' => 'int',
		'id_log_penduduk' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_kk',
		'id_peristiwa',
		'tgl_peristiwa',
		'id_pend',
		'updated_by',
		'id_log_penduduk'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function log_penduduk()
	{
		return $this->belongsTo(LogPenduduk::class, 'id_log_penduduk');
	}
}
