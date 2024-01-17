<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaTbp
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $No_Bukti
 * @property string $Tgl_Bukti
 * @property string $Kd_Desa
 * @property string|null $Uraian
 * @property string $Nm_Penyetor
 * @property string $Alamat_Penyetor
 * @property string $TTD_Penyetor
 * @property string $NoRek_Bank
 * @property string $Nama_Bank
 * @property string $Jumlah
 * @property string $Nm_Bendahara
 * @property string $Jbt_Bendahara
 * @property string $Status
 * @property string $KdBayar
 * @property string $Ref_Bayar
 * @property string|null $ID_Bank
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaTbp extends Model
{
	protected $table = 'keuangan_ta_tbp';
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
		'No_Bukti',
		'Tgl_Bukti',
		'Kd_Desa',
		'Uraian',
		'Nm_Penyetor',
		'Alamat_Penyetor',
		'TTD_Penyetor',
		'NoRek_Bank',
		'Nama_Bank',
		'Jumlah',
		'Nm_Bendahara',
		'Jbt_Bendahara',
		'Status',
		'KdBayar',
		'Ref_Bayar',
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
