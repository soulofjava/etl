<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserGrup
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama
 * @property string|null $slug
 * @property int $jenis
 * @property Carbon $created_at
 * @property int|null $created_by
 * @property Carbon $updated_at
 * @property int $updated_by
 * 
 * @property Config|null $config
 * @property Collection|GrupAkse[] $grup_akses
 *
 * @package App\Models
 */
class UserGrup extends Model
{
	protected $table = 'user_grup';

	protected $casts = [
		'config_id' => 'int',
		'jenis' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nama',
		'slug',
		'jenis',
		'created_by',
		'updated_by'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function grup_akses()
	{
		return $this->hasMany(GrupAkse::class, 'id_grup');
	}
}
