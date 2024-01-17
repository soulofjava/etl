<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaSpjSisa
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $Kd_Desa
 * @property string $No_Bukti
 * @property string $Tgl_Bukti
 * @property string $No_SPJ
 * @property string $Tgl_SPJ
 * @property string $No_SPP
 * @property string $Tgl_SPP
 * @property string $Kd_Keg
 * @property string|null $keterangan
 * @property string $Nilai
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaSpjSisa extends Model
{
	protected $table = 'keuangan_ta_spj_sisa';
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
		'No_Bukti',
		'Tgl_Bukti',
		'No_SPJ',
		'Tgl_SPJ',
		'No_SPP',
		'Tgl_SPP',
		'Kd_Keg',
		'keterangan',
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
