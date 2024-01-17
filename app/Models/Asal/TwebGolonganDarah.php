<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebGolonganDarah
 * 
 * @property int $id
 * @property string|null $nama
 *
 * @package App\Models
 */
class TwebGolonganDarah extends Model
{
	protected $table = 'tweb_golongan_darah';
	public $timestamps = false;
	protected $connection = "asal";

	protected $fillable = [
		'nama'
	];
}
