<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebPendudukPekerjaan
 * 
 * @property int $id
 * @property string|null $nama
 *
 * @package App\Models
 */
class TwebPendudukPekerjaan extends Model
{
	protected $table = 'tweb_penduduk_pekerjaan';
	public $timestamps = false;
	protected $connection = "asal";

	protected $fillable = [
		'nama'
	];
}
