<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AnalisisPartisipasi
 * 
 * @property int $id
 * @property int $id_subjek
 * @property int $id_master
 * @property int $id_periode
 * @property int $id_klassifikasi
 *
 * @package App\Models
 */
class AnalisisPartisipasi extends Model
{
	protected $table = 'analisis_partisipasi';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'id_subjek' => 'int',
		'id_master' => 'int',
		'id_periode' => 'int',
		'id_klassifikasi' => 'int'
	];

	protected $fillable = [
		'id_subjek',
		'id_master',
		'id_periode',
		'id_klassifikasi'
	];
}
