<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Menu
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama
 * @property string $link
 * @property int|null $parrent
 * @property bool $link_tipe
 * @property bool|null $enabled
 * @property int|null $urut
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Menu extends Model
{
	protected $table = 'menu';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'parrent' => 'int',
		'link_tipe' => 'bool',
		'enabled' => 'bool',
		'urut' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nama',
		'link',
		'parrent',
		'link_tipe',
		'enabled',
		'urut'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
