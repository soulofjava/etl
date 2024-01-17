<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefStatusCovid
 * 
 * @property int $id
 * @property string $nama
 *
 * @package App\Models
 */
class RefStatusCovid extends Model
{
	protected $table = 'ref_status_covid';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $fillable = [
		'nama'
	];
}
