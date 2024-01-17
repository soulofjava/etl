<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaSpjBukti
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $No_SPJ
 * @property string $Kd_Keg
 * @property string $Kd_Rincian
 * @property string $No_Bukti
 * @property string $Tgl_Bukti
 * @property string $Sumberdana
 * @property string $Kd_Desa
 * @property string $Nm_Penerima
 * @property string $Alamat
 * @property string $Rek_Bank
 * @property string $Nm_Bank
 * @property string $NPWP
 * @property string|null $Keterangan
 * @property string $Nilai
 * @property string|null $Kd_SubRinci
 * @property string|null $Kd_Bank
 * @property string|null $Ref_Bayar
 * @property string|null $Tgl_Bayar
 * @property string|null $Validasi
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaSpjBukti extends Model
{
	protected $table = 'keuangan_ta_spj_bukti';
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
		'Kd_Keg',
		'Kd_Rincian',
		'No_Bukti',
		'Tgl_Bukti',
		'Sumberdana',
		'Kd_Desa',
		'Nm_Penerima',
		'Alamat',
		'Rek_Bank',
		'Nm_Bank',
		'NPWP',
		'Keterangan',
		'Nilai',
		'Kd_SubRinci',
		'Kd_Bank',
		'Ref_Bayar',
		'Tgl_Bayar',
		'Validasi'
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
