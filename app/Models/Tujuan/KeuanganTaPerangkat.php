<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaPerangkat
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $Kd_Desa
 * @property string $Kd_Jabatan
 * @property string $No_ID
 * @property string $Nama_Perangkat
 * @property string $Alamat_Perangkat
 * @property string $Nomor_HP
 * @property string $Rek_Bank
 * @property string $Nama_Bank
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaPerangkat extends Model
{
	protected $table = 'keuangan_ta_perangkat';
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
		'Kd_Jabatan',
		'No_ID',
		'Nama_Perangkat',
		'Alamat_Perangkat',
		'Nomor_HP',
		'Rek_Bank',
		'Nama_Bank'
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
