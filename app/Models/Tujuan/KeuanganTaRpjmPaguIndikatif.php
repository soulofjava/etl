<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaRpjmPaguIndikatif
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Kd_Desa
 * @property string $Kd_Keg
 * @property string $Kd_Sumber
 * @property string $Tahun1
 * @property string $Tahun2
 * @property string $Tahun3
 * @property string $Tahun4
 * @property string $Tahun5
 * @property string $Tahun6
 * @property string $Pola
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaRpjmPaguIndikatif extends Model
{
	protected $table = 'keuangan_ta_rpjm_pagu_indikatif';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_keuangan_master' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_keuangan_master',
		'Kd_Desa',
		'Kd_Keg',
		'Kd_Sumber',
		'Tahun1',
		'Tahun2',
		'Tahun3',
		'Tahun4',
		'Tahun5',
		'Tahun6',
		'Pola'
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
