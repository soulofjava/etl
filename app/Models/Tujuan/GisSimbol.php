<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GisSimbol
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string|null $simbol
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class GisSimbol extends Model
{
	protected $table = 'gis_simbol';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int'
	];

	protected $fillable = [
		'config_id',
		'simbol'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
