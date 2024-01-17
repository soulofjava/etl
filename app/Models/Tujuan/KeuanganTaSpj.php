<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaSpj
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $No_SPJ
 * @property string $Tgl_SPJ
 * @property string $Kd_Desa
 * @property string $No_SPP
 * @property string|null $Keterangan
 * @property string $Jumlah
 * @property string $Potongan
 * @property string $Status
 * @property string|null $Kunci
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaSpj extends Model
{
	protected $table = 'keuangan_ta_spj';
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
		'Tgl_SPJ',
		'Kd_Desa',
		'No_SPP',
		'Keterangan',
		'Jumlah',
		'Potongan',
		'Status',
		'Kunci'
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
