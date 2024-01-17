<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gari
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama
 * @property string|null $path
 * @property int $enabled
 * @property int $ref_line
 * @property string|null $foto
 * @property string|null $desk
 * @property int|null $id_cluster
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Gari extends Model
{
	protected $table = 'garis';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'enabled' => 'int',
		'ref_line' => 'int',
		'id_cluster' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nama',
		'path',
		'enabled',
		'ref_line',
		'foto',
		'desk',
		'id_cluster'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
