<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefDokuman
 * 
 * @property int $id
 * @property string $nama
 *
 * @package App\Models
 */
class RefDokuman extends Model
{
	protected $table = 'ref_dokumen';
	public $timestamps = false;
	protected $connection = "asal";

	protected $fillable = [
		'nama'
	];
}
