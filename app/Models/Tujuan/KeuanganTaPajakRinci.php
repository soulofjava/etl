<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaPajakRinci
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $Kd_Desa
 * @property string $No_SSP
 * @property string $No_Bukti
 * @property string $Kd_Rincian
 * @property string $Nilai
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaPajakRinci extends Model
{
	protected $table = 'keuangan_ta_pajak_rinci';
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
		'No_SSP',
		'No_Bukti',
		'Kd_Rincian',
		'Nilai'
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
