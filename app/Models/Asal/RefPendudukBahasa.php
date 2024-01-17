<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

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
	protected $connection = "asal";

	protected $fillable = [
		'nama',
		'inisial'
	];
}
