<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebPendudukKawin
 * 
 * @property int $id
 * @property string $nama
 *
 * @package App\Models
 */
class TwebPendudukKawin extends Model
{
	protected $table = 'tweb_penduduk_kawin';
	public $timestamps = false;
	protected $connection = "asal";

	protected $fillable = [
		'nama'
	];
}
