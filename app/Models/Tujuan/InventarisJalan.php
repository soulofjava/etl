<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InventarisJalan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama_barang
 * @property string $kode_barang
 * @property string $register
 * @property string $kontruksi
 * @property int $panjang
 * @property int $lebar
 * @property int $luas
 * @property string|null $letak
 * @property Carbon $tanggal_dokument
 * @property string|null $no_dokument
 * @property string|null $status_tanah
 * @property string|null $kode_tanah
 * @property string $kondisi
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
 * @property Collection|MutasiInventarisJalan[] $mutasi_inventaris_jalans
 *
 * @package App\Models
 */
class InventarisJalan extends Model
{
	protected $table = 'inventaris_jalan';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'panjang' => 'int',
		'lebar' => 'int',
		'luas' => 'int',
		'tanggal_dokument' => 'datetime',
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
		'kontruksi',
		'panjang',
		'lebar',
		'luas',
		'letak',
		'tanggal_dokument',
		'no_dokument',
		'status_tanah',
		'kode_tanah',
		'kondisi',
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

	public function mutasi_inventaris_jalans()
	{
		return $this->hasMany(MutasiInventarisJalan::class, 'id_inventaris_jalan');
	}
}
