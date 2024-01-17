<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

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
	protected $connection = "tujuan";

	protected $fillable = [
		'nama'
	];
}
