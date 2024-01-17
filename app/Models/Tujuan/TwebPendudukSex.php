<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebPendudukSex
 * 
 * @property int $id
 * @property string|null $nama
 *
 * @package App\Models
 */
class TwebPendudukSex extends Model
{
	protected $table = 'tweb_penduduk_sex';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $fillable = [
		'nama'
	];
}
