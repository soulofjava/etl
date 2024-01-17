<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganManualRefRek2
 * 
 * @property int $id
 * @property string $Akun
 * @property string $Kelompok
 * @property string $Nama_Kelompok
 *
 * @package App\Models
 */
class KeuanganManualRefRek2 extends Model
{
	protected $table = 'keuangan_manual_ref_rek2';
	public $timestamps = false;
	protected $connection = "asal";

	protected $fillable = [
		'Akun',
		'Kelompok',
		'Nama_Kelompok'
	];
}
