<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pelapak
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int|null $id_pend
 * @property string|null $telepon
 * @property string|null $lat
 * @property string|null $lng
 * @property int $zoom
 * @property bool $status
 * 
 * @property Config|null $config
 * @property Collection|Produk[] $produks
 *
 * @package App\Models
 */
class Pelapak extends Model
{
	protected $table = 'pelapak';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_pend' => 'int',
		'zoom' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'config_id',
		'id_pend',
		'telepon',
		'lat',
		'lng',
		'zoom',
		'status'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function produks()
	{
		return $this->hasMany(Produk::class, 'id_pelapak');
	}
}
