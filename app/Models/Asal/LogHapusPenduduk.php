<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LogHapusPenduduk
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_pend
 * @property float $nik
 * @property string|null $foto
 * @property string|null $deleted_by
 * @property string $deleted_at
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class LogHapusPenduduk extends Model
{
	use SoftDeletes;
	protected $table = 'log_hapus_penduduk';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_pend' => 'int',
		'nik' => 'float'
	];

	protected $fillable = [
		'config_id',
		'id_pend',
		'nik',
		'foto',
		'deleted_by'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
