<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaMutasi
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $Kd_Desa
 * @property string $No_Bukti
 * @property string $Tgl_Bukti
 * @property string|null $Keterangan
 * @property string|null $Kd_Bank
 * @property string $Kd_Rincian
 * @property string $Kd_Keg
 * @property string $Sumberdana
 * @property string $Kd_Mutasi
 * @property string $Nilai
 * @property string|null $ID_Bank
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaMutasi extends Model
{
	protected $table = 'keuangan_ta_mutasi';
	public $timestamps = false;
	protected $connection = "asal";

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
		'Keterangan',
		'Kd_Bank',
		'Kd_Rincian',
		'Kd_Keg',
		'Sumberdana',
		'Kd_Mutasi',
		'Nilai',
		'ID_Bank'
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
