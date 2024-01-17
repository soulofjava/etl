<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaRpjmKegiatan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Kd_Desa
 * @property string|null $Kd_Bid
 * @property string $Kd_Keg
 * @property string $ID_Keg
 * @property string $Nama_Kegiatan
 * @property string $Lokasi
 * @property string $Keluaran
 * @property string $Kd_Sas
 * @property string $Sasaran
 * @property string $Tahun1
 * @property string $Tahun2
 * @property string $Tahun3
 * @property string $Tahun4
 * @property string $Tahun5
 * @property string $Tahun6
 * @property string $Swakelola
 * @property string $Kerjasama
 * @property string $Pihak_Ketiga
 * @property string $Sumberdana
 * @property string|null $Kd_Sub
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaRpjmKegiatan extends Model
{
	protected $table = 'keuangan_ta_rpjm_kegiatan';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_keuangan_master' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_keuangan_master',
		'Kd_Desa',
		'Kd_Bid',
		'Kd_Keg',
		'ID_Keg',
		'Nama_Kegiatan',
		'Lokasi',
		'Keluaran',
		'Kd_Sas',
		'Sasaran',
		'Tahun1',
		'Tahun2',
		'Tahun3',
		'Tahun4',
		'Tahun5',
		'Tahun6',
		'Swakelola',
		'Kerjasama',
		'Pihak_Ketiga',
		'Sumberdana',
		'Kd_Sub'
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
