<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogPerubahanPenduduk
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_pend
 * @property string $id_cluster
 * @property Carbon $tanggal
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class LogPerubahanPenduduk extends Model
{
	protected $table = 'log_perubahan_penduduk';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_pend' => 'int',
		'tanggal' => 'datetime'
	];

	protected $fillable = [
		'config_id',
		'id_pend',
		'id_cluster',
		'tanggal'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
