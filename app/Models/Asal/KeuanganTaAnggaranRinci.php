<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaAnggaranRinci
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $KdPosting
 * @property string $Tahun
 * @property string $Kd_Desa
 * @property string $Kd_Keg
 * @property string $Kd_Rincian
 * @property string $Kd_SubRinci
 * @property string $No_Urut
 * @property string $Uraian
 * @property string $SumberDana
 * @property string $JmlSatuan
 * @property string $HrgSatuan
 * @property string $Satuan
 * @property string $Anggaran
 * @property string $JmlSatuanPAK
 * @property string $HrgSatuanPAK
 * @property string $AnggaranStlhPAK
 * @property string $AnggaranPAK
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaAnggaranRinci extends Model
{
	protected $table = 'keuangan_ta_anggaran_rinci';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_keuangan_master' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_keuangan_master',
		'KdPosting',
		'Tahun',
		'Kd_Desa',
		'Kd_Keg',
		'Kd_Rincian',
		'Kd_SubRinci',
		'No_Urut',
		'Uraian',
		'SumberDana',
		'JmlSatuan',
		'HrgSatuan',
		'Satuan',
		'Anggaran',
		'JmlSatuanPAK',
		'HrgSatuanPAK',
		'AnggaranStlhPAK',
		'AnggaranPAK'
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
