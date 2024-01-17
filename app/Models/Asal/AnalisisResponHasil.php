<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AnalisisResponHasil
 * 
 * @property int $id_master
 * @property int|null $config_id
 * @property int $id_periode
 * @property int $id_subjek
 * @property float $akumulasi
 * @property Carbon $tgl_update
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class AnalisisResponHasil extends Model
{
	protected $table = 'analisis_respon_hasil';
	public $incrementing = false;
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'id_master' => 'int',
		'config_id' => 'int',
		'id_periode' => 'int',
		'id_subjek' => 'int',
		'akumulasi' => 'float',
		'tgl_update' => 'datetime'
	];

	protected $fillable = [
		'config_id',
		'akumulasi',
		'tgl_update'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
