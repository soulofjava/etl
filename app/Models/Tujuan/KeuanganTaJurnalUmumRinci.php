<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaJurnalUmumRinci
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $NoBukti
 * @property string $Kd_Keg
 * @property string $RincianSD
 * @property string $NoID
 * @property string $Kd_Desa
 * @property string $Akun
 * @property string $Kd_Rincian
 * @property string $Sumberdana
 * @property string $DK
 * @property string $Debet
 * @property string $Kredit
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaJurnalUmumRinci extends Model
{
	protected $table = 'keuangan_ta_jurnal_umum_rinci';
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
		'NoBukti',
		'Kd_Keg',
		'RincianSD',
		'NoID',
		'Kd_Desa',
		'Akun',
		'Kd_Rincian',
		'Sumberdana',
		'DK',
		'Debet',
		'Kredit'
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
