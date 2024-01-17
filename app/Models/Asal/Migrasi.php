<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Migrasi
 * 
 * @property int $id
 * @property string $versi_database
 * @property string|null $premium
 *
 * @package App\Models
 */
class Migrasi extends Model
{
	protected $table = 'migrasi';
	public $timestamps = false;
	protected $connection = "asal";

	protected $fillable = [
		'versi_database',
		'premium'
	];
}
