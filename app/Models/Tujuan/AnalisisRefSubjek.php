<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AnalisisRefSubjek
 * 
 * @property int $id
 * @property string $subjek
 *
 * @package App\Models
 */
class AnalisisRefSubjek extends Model
{
	protected $table = 'analisis_ref_subjek';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $fillable = [
		'subjek'
	];
}
