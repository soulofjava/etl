<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefPeristiwa
 * 
 * @property int $id
 * @property string $nama
 *
 * @package App\Models
 */
class RefPeristiwa extends Model
{
	protected $table = 'ref_peristiwa';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $fillable = [
		'nama'
	];
}
