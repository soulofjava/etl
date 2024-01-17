<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaDesa
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $Kd_Desa
 * @property string $Nm_Kades
 * @property string $Jbt_Kades
 * @property string $Nm_Sekdes
 * @property string $NIP_Sekdes
 * @property string $Jbt_Sekdes
 * @property string $Nm_Kaur_Keu
 * @property string $Jbt_Kaur_Keu
 * @property string $Nm_Bendahara
 * @property string $Jbt_Bendahara
 * @property string $No_Perdes
 * @property string $Tgl_Perdes
 * @property string $No_Perdes_PB
 * @property string $Tgl_Perdes_PB
 * @property string $No_Perdes_PJ
 * @property string $Tgl_Perdes_PJ
 * @property string $Alamat
 * @property string $Ibukota
 * @property string $Status
 * @property string $NPWP
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaDesa extends Model
{
	protected $table = 'keuangan_ta_desa';
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
		'Nm_Kades',
		'Jbt_Kades',
		'Nm_Sekdes',
		'NIP_Sekdes',
		'Jbt_Sekdes',
		'Nm_Kaur_Keu',
		'Jbt_Kaur_Keu',
		'Nm_Bendahara',
		'Jbt_Bendahara',
		'No_Perdes',
		'Tgl_Perdes',
		'No_Perdes_PB',
		'Tgl_Perdes_PB',
		'No_Perdes_PJ',
		'Tgl_Perdes_PJ',
		'Alamat',
		'Ibukota',
		'Status',
		'NPWP'
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
