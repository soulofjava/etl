<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebPendudukHubungan
 * 
 * @property int $id
 * @property string $nama
 *
 * @package App\Models
 */
class TwebPendudukHubungan extends Model
{
	protected $table = 'tweb_penduduk_hubungan';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $fillable = [
		'nama'
	];
}
