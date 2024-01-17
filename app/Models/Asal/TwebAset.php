<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebAset
 * 
 * @property int $id_aset
 * @property string $golongan
 * @property string $bidang
 * @property string $kelompok
 * @property string $sub_kelompok
 * @property string $sub_sub_kelompok
 * @property string $nama
 *
 * @package App\Models
 */
class TwebAset extends Model
{
	protected $table = 'tweb_aset';
	protected $primaryKey = 'id_aset';
	public $incrementing = false;
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'id_aset' => 'int'
	];

	protected $fillable = [
		'golongan',
		'bidang',
		'kelompok',
		'sub_kelompok',
		'sub_sub_kelompok',
		'nama'
	];
}
