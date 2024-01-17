<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaPajak
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $Kd_Desa
 * @property string $No_SSP
 * @property string $Tgl_SSP
 * @property string|null $Keterangan
 * @property string $Nama_WP
 * @property string $Alamat_WP
 * @property string $NPWP
 * @property string $Kd_MAP
 * @property string $Nm_Penyetor
 * @property string $Jn_Transaksi
 * @property string $Kd_Rincian
 * @property string $Jumlah
 * @property string $KdBayar
 * @property string|null $ID_Bank
 * @property string|null $NTPN
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaPajak extends Model
{
	protected $table = 'keuangan_ta_pajak';
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
		'Tgl_SSP',
		'Keterangan',
		'Nama_WP',
		'Alamat_WP',
		'NPWP',
		'Kd_MAP',
		'Nm_Penyetor',
		'Jn_Transaksi',
		'Kd_Rincian',
		'Jumlah',
		'KdBayar',
		'ID_Bank',
		'NTPN'
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
