<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaJurnalUmum
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $KdBuku
 * @property string $Kd_Desa
 * @property string $Tanggal
 * @property string $JnsBukti
 * @property string $NoBukti
 * @property string $Keterangan
 * @property string $DK
 * @property string $Debet
 * @property string $Kredit
 * @property string $Jenis
 * @property string $Posted
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaJurnalUmum extends Model
{
	protected $table = 'keuangan_ta_jurnal_umum';
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
		'KdBuku',
		'Kd_Desa',
		'Tanggal',
		'JnsBukti',
		'NoBukti',
		'Keterangan',
		'DK',
		'Debet',
		'Kredit',
		'Jenis',
		'Posted'
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
