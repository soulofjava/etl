<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganRefKegiatan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string|null $Kd_Bid
 * @property string $ID_Keg
 * @property string $Nama_Kegiatan
 * @property int|null $Jns_Kegiatan
 * @property string|null $Kd_Sub
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganRefKegiatan extends Model
{
	protected $table = 'keuangan_ref_kegiatan';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_keuangan_master' => 'int',
		'Jns_Kegiatan' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_keuangan_master',
		'Kd_Bid',
		'ID_Keg',
		'Nama_Kegiatan',
		'Jns_Kegiatan',
		'Kd_Sub'
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
