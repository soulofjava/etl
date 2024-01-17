<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AnalisisTipeIndikator
 * 
 * @property int $id
 * @property string $tipe
 *
 * @package App\Models
 */
class AnalisisTipeIndikator extends Model
{
	protected $table = 'analisis_tipe_indikator';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $fillable = [
		'tipe'
	];
}
