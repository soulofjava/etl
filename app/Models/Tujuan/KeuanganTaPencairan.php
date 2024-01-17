<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaPencairan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $No_Cek
 * @property string $No_SPP
 * @property string $Tgl_Cek
 * @property string $Kd_Desa
 * @property string|null $Keterangan
 * @property string $Jumlah
 * @property string $Potongan
 * @property string $KdBayar
 * @property string|null $ID_Bank
 * @property string|null $Kunci
 * @property string|null $No_Ref
 * @property string|null $Tgl_Bayar
 * @property string|null $Validasi
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaPencairan extends Model
{
	protected $table = 'keuangan_ta_pencairan';
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
		'No_Cek',
		'No_SPP',
		'Tgl_Cek',
		'Kd_Desa',
		'Keterangan',
		'Jumlah',
		'Potongan',
		'KdBayar',
		'ID_Bank',
		'Kunci',
		'No_Ref',
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
