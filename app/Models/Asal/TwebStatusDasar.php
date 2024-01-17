<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebStatusDasar
 * 
 * @property int $id
 * @property string|null $nama
 *
 * @package App\Models
 */
class TwebStatusDasar extends Model
{
	protected $table = 'tweb_status_dasar';
	public $timestamps = false;
	protected $connection = "asal";

	protected $fillable = [
		'nama'
	];
}
