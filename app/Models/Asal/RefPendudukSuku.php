<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefPendudukSuku
 * 
 * @property int $id
 * @property string $suku
 * @property string $deskripsi
 *
 * @package App\Models
 */
class RefPendudukSuku extends Model
{
	protected $table = 'ref_penduduk_suku';
	public $timestamps = false;
	protected $connection = "asal";

	protected $fillable = [
		'suku',
		'deskripsi'
	];
}
