<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganRefBankDesa
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $Kd_Desa
 * @property string $Kd_Rincian
 * @property string $NoRek_Bank
 * @property string $Nama_Bank
 * @property string|null $Kantor_Cabang
 * @property string|null $Nama_Pemilik
 * @property string|null $Alamat_Pemilik
 * @property string|null $No_Identitas
 * @property string|null $No_Telepon
 * @property string|null $ID_Bank
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganRefBankDesa extends Model
{
	protected $table = 'keuangan_ref_bank_desa';
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
		'Kd_Rincian',
		'NoRek_Bank',
		'Nama_Bank',
		'Kantor_Cabang',
		'Nama_Pemilik',
		'Alamat_Pemilik',
		'No_Identitas',
		'No_Telepon',
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
