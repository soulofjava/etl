<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Line
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama
 * @property string|null $simbol
 * @property string|null $color
 * @property int|null $tipe
 * @property int|null $tebal
 * @property string|null $jenis
 * @property int|null $parrent
 * @property int $enabled
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Line extends Model
{
	protected $table = 'line';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'tipe' => 'int',
		'tebal' => 'int',
		'parrent' => 'int',
		'enabled' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nama',
		'simbol',
		'color',
		'tipe',
		'tebal',
		'jenis',
		'parrent',
		'enabled'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
