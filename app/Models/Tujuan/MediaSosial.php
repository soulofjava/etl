<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MediaSosial
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $gambar
 * @property string|null $link
 * @property string $nama
 * @property bool|null $tipe
 * @property int $enabled
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class MediaSosial extends Model
{
	protected $table = 'media_sosial';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'tipe' => 'bool',
		'enabled' => 'int'
	];

	protected $fillable = [
		'config_id',
		'gambar',
		'link',
		'nama',
		'tipe',
		'enabled'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
