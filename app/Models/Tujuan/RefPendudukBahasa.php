<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefPendudukBahasa
 * 
 * @property int $id
 * @property string $nama
 * @property string $inisial
 *
 * @package App\Models
 */
class RefPendudukBahasa extends Model
{
	protected $table = 'ref_penduduk_bahasa';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $fillable = [
		'nama',
		'inisial'
	];
}
