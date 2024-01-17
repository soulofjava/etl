<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganManualRinciTpl
 * 
 * @property int $id
 * @property string $Tahun
 * @property string $Kd_Akun
 * @property string $Kd_Keg
 * @property string $Kd_Rincian
 * @property string $Nilai_Anggaran
 * @property string $Nilai_Realisasi
 *
 * @package App\Models
 */
class KeuanganManualRinciTpl extends Model
{
	protected $table = 'keuangan_manual_rinci_tpl';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $fillable = [
		'Tahun',
		'Kd_Akun',
		'Kd_Keg',
		'Kd_Rincian',
		'Nilai_Anggaran',
		'Nilai_Realisasi'
	];
}
