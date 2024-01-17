<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaTriwulan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $KURincianSD
 * @property string $Tahun
 * @property string $Sifat
 * @property string $SumberDana
 * @property string $Kd_Desa
 * @property string $Kd_Keg
 * @property string $Kd_Rincian
 * @property string $Anggaran
 * @property string $AnggaranPAK
 * @property string|null $Tw1Rinci
 * @property string|null $Tw2Rinci
 * @property string|null $Tw3Rinci
 * @property string|null $Tw4Rinci
 * @property string $KunciData
 * @property string|null $Jan
 * @property string|null $Peb
 * @property string|null $Mar
 * @property string|null $Apr
 * @property string|null $Mei
 * @property string|null $Jun
 * @property string|null $Jul
 * @property string|null $Agt
 * @property string|null $Sep
 * @property string|null $Okt
 * @property string|null $Nop
 * @property string|null $Des
 * @property string|null $Kd_SubRinci
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaTriwulan extends Model
{
	protected $table = 'keuangan_ta_triwulan';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_keuangan_master' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_keuangan_master',
		'KURincianSD',
		'Tahun',
		'Sifat',
		'SumberDana',
		'Kd_Desa',
		'Kd_Keg',
		'Kd_Rincian',
		'Anggaran',
		'AnggaranPAK',
		'Tw1Rinci',
		'Tw2Rinci',
		'Tw3Rinci',
		'Tw4Rinci',
		'KunciData',
		'Jan',
		'Peb',
		'Mar',
		'Apr',
		'Mei',
		'Jun',
		'Jul',
		'Agt',
		'Sep',
		'Okt',
		'Nop',
		'Des',
		'Kd_SubRinci'
	];

	public function keuangan_master()
	{
		return $this->belongsTo(KeuanganMaster::class, 'id_keuangan_master');
	}

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
