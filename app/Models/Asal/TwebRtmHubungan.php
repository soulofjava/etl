<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebRtmHubungan
 * 
 * @property int $id
 * @property string $nama
 *
 * @package App\Models
 */
class TwebRtmHubungan extends Model
{
	protected $table = 'tweb_rtm_hubungan';
	public $timestamps = false;
	protected $connection = "asal";

	protected $fillable = [
		'nama'
	];
}
