<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaRab
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $Kd_Desa
 * @property string $Kd_Keg
 * @property string $Kd_Rincian
 * @property string $Anggaran
 * @property string $AnggaranPAK
 * @property string $AnggaranStlhPAK
 * @property string|null $Kd_SubRinci
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaRab extends Model
{
	protected $table = 'keuangan_ta_rab';
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
		'Kd_Desa',
		'Kd_Keg',
		'Kd_Rincian',
		'Anggaran',
		'AnggaranPAK',
		'AnggaranStlhPAK',
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
