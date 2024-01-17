<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaAnggaran
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $KdPosting
 * @property string $Tahun
 * @property string $KURincianSD
 * @property string $KD_Rincian
 * @property string $RincianSD
 * @property string $Anggaran
 * @property string $AnggaranPAK
 * @property string $AnggaranStlhPAK
 * @property string $Belanja
 * @property string $Kd_keg
 * @property string $SumberDana
 * @property string $Kd_Desa
 * @property string $TglPosting
 * @property string|null $Kd_SubRinci
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaAnggaran extends Model
{
	protected $table = 'keuangan_ta_anggaran';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_keuangan_master' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_keuangan_master',
		'KdPosting',
		'Tahun',
		'KURincianSD',
		'KD_Rincian',
		'RincianSD',
		'Anggaran',
		'AnggaranPAK',
		'AnggaranStlhPAK',
		'Belanja',
		'Kd_keg',
		'SumberDana',
		'Kd_Desa',
		'TglPosting',
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
