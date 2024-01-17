<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Supleman
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string|null $nama
 * @property string|null $slug
 * @property int|null $sasaran
 * @property string|null $keterangan
 * 
 * @property Config|null $config
 * @property Collection|SuplemenTerdatum[] $suplemen_terdata
 *
 * @package App\Models
 */
class Supleman extends Model
{
	protected $table = 'suplemen';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'sasaran' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nama',
		'slug',
		'sasaran',
		'keterangan'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function suplemen_terdata()
	{
		return $this->hasMany(SuplemenTerdatum::class, 'id_suplemen');
	}
}
