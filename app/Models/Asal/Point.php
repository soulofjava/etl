<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Point
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama
 * @property string|null $simbol
 * @property int|null $tipe
 * @property int $parrent
 * @property int $enabled
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Point extends Model
{
	protected $table = 'point';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'tipe' => 'int',
		'parrent' => 'int',
		'enabled' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nama',
		'simbol',
		'tipe',
		'parrent',
		'enabled'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
