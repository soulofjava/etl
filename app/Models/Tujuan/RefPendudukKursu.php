<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefPendudukKursu
 * 
 * @property int $id
 * @property string $nama
 *
 * @package App\Models
 */
class RefPendudukKursu extends Model
{
	protected $table = 'ref_penduduk_kursus';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $fillable = [
		'nama'
	];
}
