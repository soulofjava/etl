<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebCaraKb
 * 
 * @property int $id
 * @property string $nama
 * @property int|null $sex
 *
 * @package App\Models
 */
class TwebCaraKb extends Model
{
	protected $table = 'tweb_cara_kb';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'sex' => 'int'
	];

	protected $fillable = [
		'nama',
		'sex'
	];
}
