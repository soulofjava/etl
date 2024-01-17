<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AnalisisRespon
 * 
 * @property int $id_indikator
 * @property int|null $config_id
 * @property int $id_parameter
 * @property int $id_subjek
 * @property int $id_periode
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class AnalisisRespon extends Model
{
	protected $table = 'analisis_respon';
	public $incrementing = false;
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'id_indikator' => 'int',
		'config_id' => 'int',
		'id_parameter' => 'int',
		'id_subjek' => 'int',
		'id_periode' => 'int'
	];

	protected $fillable = [
		'id_indikator',
		'config_id',
		'id_parameter',
		'id_subjek',
		'id_periode'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
