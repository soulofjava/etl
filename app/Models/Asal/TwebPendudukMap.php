<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebPendudukMap
 * 
 * @property int $id
 * @property string|null $lat
 * @property string|null $lng
 *
 * @package App\Models
 */
class TwebPendudukMap extends Model
{
	protected $table = 'tweb_penduduk_map';
	public $incrementing = false;
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'id',
		'lat',
		'lng'
	];
}
