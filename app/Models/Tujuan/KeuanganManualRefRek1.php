<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganManualRefRek1
 * 
 * @property int $id
 * @property string $Akun
 * @property string $Nama_Akun
 *
 * @package App\Models
 */
class KeuanganManualRefRek1 extends Model
{
	protected $table = 'keuangan_manual_ref_rek1';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $fillable = [
		'Akun',
		'Nama_Akun'
	];
}
