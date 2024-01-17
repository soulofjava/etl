<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebStatusKtp
 * 
 * @property int $id
 * @property string $nama
 * @property int $ktp_el
 * @property string $status_rekam
 *
 * @package App\Models
 */
class TwebStatusKtp extends Model
{
	protected $table = 'tweb_status_ktp';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'ktp_el' => 'int'
	];

	protected $fillable = [
		'nama',
		'ktp_el',
		'status_rekam'
	];
}
