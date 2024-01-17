<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lokasi
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $desk
 * @property string $nama
 * @property int $enabled
 * @property string|null $lat
 * @property string|null $lng
 * @property int $ref_point
 * @property string|null $foto
 * @property int|null $id_cluster
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Lokasi extends Model
{
	protected $table = 'lokasi';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'enabled' => 'int',
		'ref_point' => 'int',
		'id_cluster' => 'int'
	];

	protected $fillable = [
		'config_id',
		'desk',
		'nama',
		'enabled',
		'lat',
		'lng',
		'ref_point',
		'foto',
		'id_cluster'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
