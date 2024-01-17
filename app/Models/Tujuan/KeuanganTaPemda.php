<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaPemda
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $Kd_Prov
 * @property string $Kd_Kab
 * @property string $Nama_Pemda
 * @property string $Nama_Provinsi
 * @property string $Ibukota
 * @property string $Alamat
 * @property string $Nm_Bupati
 * @property string $Jbt_Bupati
 * @property string|null $Logo
 * @property string $C_Kode
 * @property string $C_Pemda
 * @property string $C_Data
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaPemda extends Model
{
	protected $table = 'keuangan_ta_pemda';
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
		'Kd_Prov',
		'Kd_Kab',
		'Nama_Pemda',
		'Nama_Provinsi',
		'Ibukota',
		'Alamat',
		'Nm_Bupati',
		'Jbt_Bupati',
		'Logo',
		'C_Kode',
		'C_Pemda',
		'C_Data'
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
