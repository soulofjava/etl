<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebSakitMenahun
 * 
 * @property int $id
 * @property string $nama
 *
 * @package App\Models
 */
class TwebSakitMenahun extends Model
{
	protected $table = 'tweb_sakit_menahun';
	public $timestamps = false;
	protected $connection = "asal";

	protected $fillable = [
		'nama'
	];
}
