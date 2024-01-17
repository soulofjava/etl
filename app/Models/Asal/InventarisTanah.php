<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InventarisTanah
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama_barang
 * @property string $kode_barang
 * @property string $register
 * @property int $luas
 * @property Carbon $tahun_pengadaan
 * @property string $letak
 * @property string $hak
 * @property string|null $no_sertifikat
 * @property Carbon|null $tanggal_sertifikat
 * @property string $penggunaan
 * @property string $asal
 * @property float $harga
 * @property string $keterangan
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property int $status
 * @property int $visible
 * 
 * @property Config|null $config
 * @property Collection|MutasiInventarisTanah[] $mutasi_inventaris_tanahs
 *
 * @package App\Models
 */
class InventarisTanah extends Model
{
	protected $table = 'inventaris_tanah';

	protected $casts = [
		'config_id' => 'int',
		'luas' => 'int',
		'tahun_pengadaan' => 'datetime',
		'tanggal_sertifikat' => 'datetime',
		'harga' => 'float',
		'created_by' => 'int',
		'updated_by' => 'int',
		'status' => 'int',
		'visible' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nama_barang',
		'kode_barang',
		'register',
		'luas',
		'tahun_pengadaan',
		'letak',
		'hak',
		'no_sertifikat',
		'tanggal_sertifikat',
		'penggunaan',
		'asal',
		'harga',
		'keterangan',
		'created_by',
		'updated_by',
		'status',
		'visible'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function mutasi_inventaris_tanahs()
	{
		return $this->hasMany(MutasiInventarisTanah::class, 'id_inventaris_tanah');
	}
}
