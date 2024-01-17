<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Kategori
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $kategori
 * @property int $tipe
 * @property int $urut
 * @property int $enabled
 * @property int $parrent
 * @property string|null $slug
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Kategori extends Model
{
	protected $table = 'kategori';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'tipe' => 'int',
		'urut' => 'int',
		'enabled' => 'int',
		'parrent' => 'int'
	];

	protected $fillable = [
		'config_id',
		'kategori',
		'tipe',
		'urut',
		'enabled',
		'parrent',
		'slug'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
