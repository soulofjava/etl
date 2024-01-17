<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefPersilMutasi
 * 
 * @property int $id
 * @property string $nama
 * @property string|null $ndesc
 *
 * @package App\Models
 */
class RefPersilMutasi extends Model
{
	protected $table = 'ref_persil_mutasi';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $fillable = [
		'nama',
		'ndesc'
	];
}
