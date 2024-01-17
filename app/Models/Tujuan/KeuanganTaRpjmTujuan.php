<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaRpjmTujuan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $ID_Tujuan
 * @property string $Kd_Desa
 * @property string $ID_Misi
 * @property string $No_Tujuan
 * @property string|null $Uraian_Tujuan
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaRpjmTujuan extends Model
{
	protected $table = 'keuangan_ta_rpjm_tujuan';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_keuangan_master' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_keuangan_master',
		'ID_Tujuan',
		'Kd_Desa',
		'ID_Misi',
		'No_Tujuan',
		'Uraian_Tujuan'
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
