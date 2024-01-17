<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebKeluargaSejahtera
 * 
 * @property int $id
 * @property string|null $nama
 *
 * @package App\Models
 */
class TwebKeluargaSejahtera extends Model
{
	protected $table = 'tweb_keluarga_sejahtera';
	public $incrementing = false;
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'nama'
	];
}
