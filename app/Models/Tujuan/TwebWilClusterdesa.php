<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebWilClusterdesa
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $rt
 * @property string $rw
 * @property string $dusun
 * @property int|null $id_kepala
 * @property string|null $lat
 * @property string|null $lng
 * @property int|null $zoom
 * @property string|null $path
 * @property string|null $map_tipe
 * @property string|null $warna
 * @property int|null $urut
 * @property int|null $urut_cetak
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class TwebWilClusterdesa extends Model
{
	protected $table = 'tweb_wil_clusterdesa';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_kepala' => 'int',
		'zoom' => 'int',
		'urut' => 'int',
		'urut_cetak' => 'int'
	];

	protected $fillable = [
		'config_id',
		'rt',
		'rw',
		'dusun',
		'id_kepala',
		'lat',
		'lng',
		'zoom',
		'path',
		'map_tipe',
		'warna',
		'urut',
		'urut_cetak'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
