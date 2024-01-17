<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaSpjRinci
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $No_SPJ
 * @property string $Kd_Keg
 * @property string $Kd_Rincian
 * @property string $Sumberdana
 * @property string $Kd_Desa
 * @property string $No_SPP
 * @property string $JmlCair
 * @property string $Nilai
 * @property string|null $Alamat
 * @property string $Sisa
 * @property string|null $Kd_SubRinci
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaSpjRinci extends Model
{
	protected $table = 'keuangan_ta_spj_rinci';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_keuangan_master' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_keuangan_master',
		'Tahun',
		'No_SPJ',
		'Kd_Keg',
		'Kd_Rincian',
		'Sumberdana',
		'Kd_Desa',
		'No_SPP',
		'JmlCair',
		'Nilai',
		'Alamat',
		'Sisa',
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
