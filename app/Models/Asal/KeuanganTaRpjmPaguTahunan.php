<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaRpjmPaguTahunan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Kd_Desa
 * @property string $Kd_Keg
 * @property string $Kd_Tahun
 * @property string $Kd_Sumber
 * @property string $Biaya
 * @property string $Volume
 * @property string $Satuan
 * @property string $Lokasi_Spesifik
 * @property string $Jml_Sas_Pria
 * @property string $Jml_Sas_Wanita
 * @property string $Jml_Sas_ARTM
 * @property string $Waktu
 * @property string $Mulai
 * @property string $Selesai
 * @property string $Pola_Kegiatan
 * @property string $Pelaksana
 * @property string|null $No_ID
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaRpjmPaguTahunan extends Model
{
	protected $table = 'keuangan_ta_rpjm_pagu_tahunan';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_keuangan_master' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_keuangan_master',
		'Kd_Desa',
		'Kd_Keg',
		'Kd_Tahun',
		'Kd_Sumber',
		'Biaya',
		'Volume',
		'Satuan',
		'Lokasi_Spesifik',
		'Jml_Sas_Pria',
		'Jml_Sas_Wanita',
		'Jml_Sas_ARTM',
		'Waktu',
		'Mulai',
		'Selesai',
		'Pola_Kegiatan',
		'Pelaksana',
		'No_ID'
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
