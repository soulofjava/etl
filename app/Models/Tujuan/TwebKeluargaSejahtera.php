<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

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
	public $incrementing = true;
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'nama'
	];
}
