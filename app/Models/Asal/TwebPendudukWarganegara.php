<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebPendudukWarganegara
 * 
 * @property int $id
 * @property string|null $nama
 *
 * @package App\Models
 */
class TwebPendudukWarganegara extends Model
{
	protected $table = 'tweb_penduduk_warganegara';
	public $timestamps = false;
	protected $connection = "asal";

	protected $fillable = [
		'nama'
	];
}
