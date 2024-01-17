<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebPendudukStatus
 * 
 * @property int $id
 * @property string|null $nama
 *
 * @package App\Models
 */
class TwebPendudukStatus extends Model
{
	protected $table = 'tweb_penduduk_status';
	public $timestamps = false;
	protected $connection = "asal";

	protected $fillable = [
		'nama'
	];
}
