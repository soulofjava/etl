<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Widget
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string|null $isi
 * @property int|null $enabled
 * @property string|null $judul
 * @property int $jenis_widget
 * @property int|null $urut
 * @property string|null $form_admin
 * @property string|null $setting
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Widget extends Model
{
	protected $table = 'widget';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'enabled' => 'int',
		'jenis_widget' => 'int',
		'urut' => 'int'
	];

	protected $fillable = [
		'config_id',
		'isi',
		'enabled',
		'judul',
		'jenis_widget',
		'urut',
		'form_admin',
		'setting'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
