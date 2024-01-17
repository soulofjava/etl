<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganTaKegiatan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_keuangan_master
 * @property string $Tahun
 * @property string $Kd_Desa
 * @property string|null $Kd_Bid
 * @property string $Kd_Keg
 * @property string $ID_Keg
 * @property string $Nama_Kegiatan
 * @property string $Pagu
 * @property string $Pagu_PAK
 * @property string $Nm_PPTKD
 * @property string $NIP_PPTKD
 * @property string $Lokasi
 * @property string $Waktu
 * @property string $Keluaran
 * @property string $Sumberdana
 * @property string|null $Jbt_PPTKD
 * @property string|null $Kd_Sub
 * @property string|null $Nilai
 * @property string|null $NilaiPAK
 * @property string|null $Satuan
 * 
 * @property KeuanganMaster $keuangan_master
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganTaKegiatan extends Model
{
	protected $table = 'keuangan_ta_kegiatan';
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
		'Kd_Bid',
		'Kd_Keg',
		'ID_Keg',
		'Nama_Kegiatan',
		'Pagu',
		'Pagu_PAK',
		'Nm_PPTKD',
		'NIP_PPTKD',
		'Lokasi',
		'Waktu',
		'Keluaran',
		'Sumberdana',
		'Jbt_PPTKD',
		'Kd_Sub',
		'Nilai',
		'NilaiPAK',
		'Satuan'
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
