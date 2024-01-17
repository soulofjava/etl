<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AnalisisKlasifikasi
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_master
 * @property string $nama
 * @property float $minval
 * @property float $maxval
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class AnalisisKlasifikasi extends Model
{
	protected $table = 'analisis_klasifikasi';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_master' => 'int',
		'minval' => 'float',
		'maxval' => 'float'
	];

	protected $fillable = [
		'config_id',
		'id_master',
		'nama',
		'minval',
		'maxval'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
