<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GrupAkse
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_grup
 * @property int $id_modul
 * @property int|null $akses
 * 
 * @property UserGrup $user_grup
 * @property SettingModul $setting_modul
 * @property Config|null $config
 *
 * @package App\Models
 */
class GrupAkse extends Model
{
	protected $table = 'grup_akses';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_grup' => 'int',
		'id_modul' => 'int',
		'akses' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_grup',
		'id_modul',
		'akses'
	];

	public function user_grup()
	{
		return $this->belongsTo(UserGrup::class, 'id_grup');
	}

	public function setting_modul()
	{
		return $this->belongsTo(SettingModul::class, 'id_modul');
	}

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
