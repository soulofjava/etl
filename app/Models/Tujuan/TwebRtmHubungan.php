<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

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
	protected $connection = "tujuan";

	protected $fillable = [
		'nama'
	];
}
