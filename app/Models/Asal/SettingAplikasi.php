<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SettingAplikasi
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string|null $judul
 * @property string|null $key
 * @property string|null $value
 * @property string|null $keterangan
 * @property string|null $jenis
 * @property string|null $option
 * @property string|null $attribute
 * @property string|null $kategori
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class SettingAplikasi extends Model
{
	protected $table = 'setting_aplikasi';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int'
	];

	protected $fillable = [
		'config_id',
		'judul',
		'key',
		'value',
		'keterangan',
		'jenis',
		'option',
		'attribute',
		'kategori'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
