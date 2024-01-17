<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaSpp
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $No_SPP
 * @property string $Tgl_SPP
 * @property string $Jn_SPP
 * @property string $Kd_Desa
 * @property string|null $Keterangan
 * @property string $Jumlah
 * @property string $Potongan
 * @property string $Status
 * @property string|null $F10
 * @property string|null $F11
 * @property string|null $FF12
 * @property string|null $FF13
 * @property string|null $FF14
 * @property string|null $Kd_Bank
 * @property string|null $Nm_Bank
 * @property string|null $Nm_Penerima
 * @property string|null $Ref_Bayar
 * @property string|null $Rek_Bank
 * @property string|null $Tgl_Bayar
 * @property string|null $Validasi
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaSpp extends Model
{
	protected $table = 'keuangan_ta_spp';
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
		'No_SPP',
		'Tgl_SPP',
		'Jn_SPP',
		'Kd_Desa',
		'Keterangan',
		'Jumlah',
		'Potongan',
		'Status',
		'F10',
		'F11',
		'FF12',
		'FF13',
		'FF14',
		'Kd_Bank',
		'Nm_Bank',
		'Nm_Penerima',
		'Ref_Bayar',
		'Rek_Bank',
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
