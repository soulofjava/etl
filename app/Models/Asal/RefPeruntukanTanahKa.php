<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefPeruntukanTanahKa
 * 
 * @property int $id
 * @property string $nama
 *
 * @package App\Models
 */
class RefPeruntukanTanahKa extends Model
{
	protected $table = 'ref_peruntukan_tanah_kas';
	public $timestamps = false;
	protected $connection = "asal";

	protected $fillable = [
		'nama'
	];
}
