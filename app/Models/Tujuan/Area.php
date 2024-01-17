<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama
 * @property string|null $path
 * @property int $enabled
 * @property int $ref_polygon
 * @property string|null $foto
 * @property int|null $id_cluster
 * @property string $desk
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Area extends Model
{
	protected $table = 'area';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'enabled' => 'int',
		'ref_polygon' => 'int',
		'id_cluster' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nama',
		'path',
		'enabled',
		'ref_polygon',
		'foto',
		'id_cluster',
		'desk'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
