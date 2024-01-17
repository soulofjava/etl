<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CdesaPenduduk
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_cdesa
 * @property int $id_pend
 * 
 * @property Config|null $config
 * @property Cdesa $cdesa
 *
 * @package App\Models
 */
class CdesaPenduduk extends Model
{
	protected $table = 'cdesa_penduduk';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_cdesa' => 'int',
		'id_pend' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_cdesa',
		'id_pend'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function cdesa()
	{
		return $this->belongsTo(Cdesa::class, 'id_cdesa');
	}
}
