<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InventarisAsset
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama_barang
 * @property string $kode_barang
 * @property string $register
 * @property string $jenis
 * @property string|null $judul_buku
 * @property string|null $spesifikasi_buku
 * @property string|null $asal_daerah
 * @property string|null $pencipta
 * @property string|null $bahan
 * @property string|null $jenis_hewan
 * @property string|null $ukuran_hewan
 * @property string|null $jenis_tumbuhan
 * @property string|null $ukuran_tumbuhan
 * @property int $jumlah
 * @property Carbon $tahun_pengadaan
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
 * @property Collection|MutasiInventarisAsset[] $mutasi_inventaris_assets
 *
 * @package App\Models
 */
class InventarisAsset extends Model
{
	protected $table = 'inventaris_asset';

	protected $casts = [
		'config_id' => 'int',
		'jumlah' => 'int',
		'tahun_pengadaan' => 'datetime',
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
		'jenis',
		'judul_buku',
		'spesifikasi_buku',
		'asal_daerah',
		'pencipta',
		'bahan',
		'jenis_hewan',
		'ukuran_hewan',
		'jenis_tumbuhan',
		'ukuran_tumbuhan',
		'jumlah',
		'tahun_pengadaan',
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

	public function mutasi_inventaris_assets()
	{
		return $this->hasMany(MutasiInventarisAsset::class, 'id_inventaris_asset');
	}
}
