<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KelompokMaster
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $kelompok
 * @property string $deskripsi
 * @property string|null $tipe
 * 
 * @property Config|null $config
 * @property Collection|Kelompok[] $kelompoks
 *
 * @package App\Models
 */
class KelompokMaster extends Model
{
	protected $table = 'kelompok_master';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int'
	];

	protected $fillable = [
		'config_id',
		'kelompok',
		'deskripsi',
		'tipe'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function kelompoks()
	{
		return $this->hasMany(Kelompok::class, 'id_master');
	}
}
