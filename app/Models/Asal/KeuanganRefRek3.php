<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganRefRek3
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Kelompok
 * @property string $Jenis
 * @property string $Nama_Jenis
 * @property int $Formula
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganRefRek3 extends Model
{
	protected $table = 'keuangan_ref_rek3';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_keuangan_master' => 'int',
		'Formula' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_keuangan_master',
		'Kelompok',
		'Jenis',
		'Nama_Jenis',
		'Formula'
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
