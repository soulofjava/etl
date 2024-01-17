<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MutasiCdesa
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int|null $id_cdesa_masuk
 * @property int|null $cdesa_keluar
 * @property int|null $jenis_mutasi
 * @property Carbon|null $tanggal_mutasi
 * @property string|null $keterangan
 * @property int $id_persil
 * @property int|null $no_bidang_persil
 * @property float|null $luas
 * @property string|null $no_objek_pajak
 * @property string|null $path
 * @property int|null $id_peta
 * 
 * @property Cdesa|null $cdesa
 * @property Config|null $config
 *
 * @package App\Models
 */
class MutasiCdesa extends Model
{
	protected $table = 'mutasi_cdesa';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_cdesa_masuk' => 'int',
		'cdesa_keluar' => 'int',
		'jenis_mutasi' => 'int',
		'tanggal_mutasi' => 'datetime',
		'id_persil' => 'int',
		'no_bidang_persil' => 'int',
		'luas' => 'float',
		'id_peta' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_cdesa_masuk',
		'cdesa_keluar',
		'jenis_mutasi',
		'tanggal_mutasi',
		'keterangan',
		'id_persil',
		'no_bidang_persil',
		'luas',
		'no_objek_pajak',
		'path',
		'id_peta'
	];

	public function cdesa()
	{
		return $this->belongsTo(Cdesa::class, 'id_cdesa_masuk');
	}

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
