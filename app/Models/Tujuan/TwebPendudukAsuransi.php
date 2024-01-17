<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebPendudukAsuransi
 * 
 * @property int $id
 * @property string $nama
 *
 * @package App\Models
 */
class TwebPendudukAsuransi extends Model
{
	protected $table = 'tweb_penduduk_asuransi';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $fillable = [
		'nama'
	];
}
