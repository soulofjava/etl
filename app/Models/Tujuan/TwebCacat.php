<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebCacat
 * 
 * @property int $id
 * @property string $nama
 *
 * @package App\Models
 */
class TwebCacat extends Model
{
	protected $table = 'tweb_cacat';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $fillable = [
		'nama'
	];
}
