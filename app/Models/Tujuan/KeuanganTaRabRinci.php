<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaRabRinci
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $Kd_Desa
 * @property string $Kd_Keg
 * @property string $Kd_Rincian
 * @property string $Kd_SubRinci
 * @property string $No_Urut
 * @property string $SumberDana
 * @property string $Uraian
 * @property string $Satuan
 * @property string $JmlSatuan
 * @property string $HrgSatuan
 * @property string $Anggaran
 * @property string $JmlSatuanPAK
 * @property string $HrgSatuanPAK
 * @property string $AnggaranStlhPAK
 * @property string $AnggaranPAK
 * @property string $Kode_SBU
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaRabRinci extends Model
{
	protected $table = 'keuangan_ta_rab_rinci';
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
		'Kd_SubRinci',
		'No_Urut',
		'SumberDana',
		'Uraian',
		'Satuan',
		'JmlSatuan',
		'HrgSatuan',
		'Anggaran',
		'JmlSatuanPAK',
		'HrgSatuanPAK',
		'AnggaranStlhPAK',
		'AnggaranPAK',
		'Kode_SBU'
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
