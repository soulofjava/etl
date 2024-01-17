<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaRpjmVisi
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $ID_Visi
 * @property string $Kd_Desa
 * @property string $No_Visi
 * @property string|null $No_RPJM
 * @property string|null $Tgl_RPJM
 * @property string|null $Uraian_Visi
 * @property string $TahunA
 * @property string $TahunN
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaRpjmVisi extends Model
{
	protected $table = 'keuangan_ta_rpjm_visi';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_keuangan_master' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_keuangan_master',
		'ID_Visi',
		'Kd_Desa',
		'No_Visi',
		'No_RPJM',
		'Tgl_RPJM',
		'Uraian_Visi',
		'TahunA',
		'TahunN'
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
