<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaAnggaranLog
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $KdPosting
 * @property string $Tahun
 * @property string $Kd_Desa
 * @property string $No_Perdes
 * @property string $TglPosting
 * @property string $UserID
 * @property string $Kunci
 * @property string|null $No_Perkades
 * @property string|null $Petugas
 * @property string|null $Tanggal
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaAnggaranLog extends Model
{
	protected $table = 'keuangan_ta_anggaran_log';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_keuangan_master' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_keuangan_master',
		'KdPosting',
		'Tahun',
		'Kd_Desa',
		'No_Perdes',
		'TglPosting',
		'UserID',
		'Kunci',
		'No_Perkades',
		'Petugas',
		'Tanggal'
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
