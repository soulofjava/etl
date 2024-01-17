<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GambarGallery
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int|null $parrent
 * @property string $gambar
 * @property string $nama
 * @property int $enabled
 * @property Carbon $tgl_upload
 * @property int|null $tipe
 * @property bool|null $slider
 * @property int|null $urut
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class GambarGallery extends Model
{
	protected $table = 'gambar_gallery';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'parrent' => 'int',
		'enabled' => 'int',
		'tgl_upload' => 'datetime',
		'tipe' => 'int',
		'slider' => 'bool',
		'urut' => 'int'
	];

	protected $fillable = [
		'config_id',
		'parrent',
		'gambar',
		'nama',
		'enabled',
		'tgl_upload',
		'tipe',
		'slider',
		'urut'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
