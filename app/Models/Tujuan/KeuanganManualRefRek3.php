<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganManualRefRek3
 * 
 * @property int $id
 * @property string $Kelompok
 * @property string $Jenis
 * @property string $Nama_Jenis
 *
 * @package App\Models
 */
class KeuanganManualRefRek3 extends Model
{
	protected $table = 'keuangan_manual_ref_rek3';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $fillable = [
		'Kelompok',
		'Jenis',
		'Nama_Jenis'
	];
}
