<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaRpjmSasaran
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $ID_Sasaran
 * @property string $Kd_Desa
 * @property string $ID_Tujuan
 * @property string $No_Sasaran
 * @property string|null $Uraian_Sasaran
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaRpjmSasaran extends Model
{
	protected $table = 'keuangan_ta_rpjm_sasaran';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_keuangan_master' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_keuangan_master',
		'ID_Sasaran',
		'Kd_Desa',
		'ID_Tujuan',
		'No_Sasaran',
		'Uraian_Sasaran'
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
