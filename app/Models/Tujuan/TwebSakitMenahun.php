<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

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
	protected $connection = "tujuan";

	protected $fillable = [
		'nama'
	];
}
