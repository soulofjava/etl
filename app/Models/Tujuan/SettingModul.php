<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SettingModul
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $modul
 * @property string|null $slug
 * @property string $url
 * @property bool $aktif
 * @property string|null $ikon
 * @property int|null $urut
 * @property bool $level
 * @property bool $hidden
 * @property string|null $ikon_kecil
 * @property int|null $parent
 * 
 * @property Config|null $config
 * @property Collection|GrupAkse[] $grup_akses
 *
 * @package App\Models
 */
class SettingModul extends Model
{
	protected $table = 'setting_modul';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'aktif' => 'bool',
		'urut' => 'int',
		'level' => 'bool',
		'hidden' => 'bool',
		'parent' => 'int'
	];

	protected $fillable = [
		'config_id',
		'modul',
		'slug',
		'url',
		'aktif',
		'ikon',
		'urut',
		'level',
		'hidden',
		'ikon_kecil',
		'parent'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function grup_akses()
	{
		return $this->hasMany(GrupAkse::class, 'id_modul');
	}
}
