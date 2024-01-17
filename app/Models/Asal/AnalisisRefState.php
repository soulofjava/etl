<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AnalisisRefState
 * 
 * @property int $id
 * @property string $nama
 *
 * @package App\Models
 */
class AnalisisRefState extends Model
{
	protected $table = 'analisis_ref_state';
	public $timestamps = false;
	protected $connection = "asal";

	protected $fillable = [
		'nama'
	];
}
