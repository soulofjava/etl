<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefPendudukHamil
 * 
 * @property int $id
 * @property string $nama
 *
 * @package App\Models
 */
class RefPendudukHamil extends Model
{
	protected $table = 'ref_penduduk_hamil';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $fillable = [
		'nama'
	];
}
