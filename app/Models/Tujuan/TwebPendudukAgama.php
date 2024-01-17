<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebPendudukAgama
 * 
 * @property int $id
 * @property string $nama
 *
 * @package App\Models
 */
class TwebPendudukAgama extends Model
{
	protected $table = 'tweb_penduduk_agama';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $fillable = [
		'nama'
	];
}
