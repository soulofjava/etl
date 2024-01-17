<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefPersilKela
 * 
 * @property int $id
 * @property string $tipe
 * @property string $kode
 * @property string|null $ndesc
 *
 * @package App\Models
 */
class RefPersilKela extends Model
{
	protected $table = 'ref_persil_kelas';
	public $timestamps = false;
	protected $connection = "asal";

	protected $fillable = [
		'tipe',
		'kode',
		'ndesc'
	];
}
