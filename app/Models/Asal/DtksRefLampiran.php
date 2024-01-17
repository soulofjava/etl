<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DtksRefLampiran
 * 
 * @property int $id
 * @property int $id_dtks
 * @property int $id_lampiran
 * 
 * @property DtksLampiran $dtks_lampiran
 * @property Dtk $dtk
 *
 * @package App\Models
 */
class DtksRefLampiran extends Model
{
	protected $table = 'dtks_ref_lampiran';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'id_dtks' => 'int',
		'id_lampiran' => 'int'
	];

	protected $fillable = [
		'id_dtks',
		'id_lampiran'
	];

	public function dtks_lampiran()
	{
		return $this->belongsTo(DtksLampiran::class, 'id_lampiran');
	}

	public function dtk()
	{
		return $this->belongsTo(Dtk::class, 'id_dtks');
	}
}
