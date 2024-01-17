<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Persil
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nomor
 * @property int|null $nomor_urut_bidang
 * @property int $kelas
 * @property float|null $luas_persil
 * @property int|null $id_wilayah
 * @property string|null $lokasi
 * @property string|null $path
 * @property int|null $cdesa_awal
 * @property int|null $id_peta
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Persil extends Model
{
	protected $table = 'persil';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'nomor_urut_bidang' => 'int',
		'kelas' => 'int',
		'luas_persil' => 'float',
		'id_wilayah' => 'int',
		'cdesa_awal' => 'int',
		'id_peta' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nomor',
		'nomor_urut_bidang',
		'kelas',
		'luas_persil',
		'id_wilayah',
		'lokasi',
		'path',
		'cdesa_awal',
		'id_peta'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
