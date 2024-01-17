<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefAsalTanahKa
 * 
 * @property int $id
 * @property string $nama
 *
 * @package App\Models
 */
class RefAsalTanahKa extends Model
{
	protected $table = 'ref_asal_tanah_kas';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $fillable = [
		'nama'
	];
}
