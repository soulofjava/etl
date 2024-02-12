<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InventarisPeralatan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama_barang
 * @property string $kode_barang
 * @property string $register
 * @property string|null $merk
 * @property string|null $ukuran
 * @property string|null $bahan
 * @property Carbon $tahun_pengadaan
 * @property string|null $no_pabrik
 * @property string|null $no_rangka
 * @property string|null $no_mesin
 * @property string|null $no_polisi
 * @property string|null $no_bpkb
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
 * @property Collection|MutasiInventarisPeralatan[] $mutasi_inventaris_peralatans
 *
 * @package App\Models
 */
class InventarisPeralatan extends Model
{
	protected $table = 'inventaris_peralatan';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
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
		'merk',
		'ukuran',
		'bahan',
		'tahun_pengadaan',
		'no_pabrik',
		'no_rangka',
		'no_mesin',
		'no_polisi',
		'no_bpkb',
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

	public function mutasi_inventaris_peralatans()
	{
		return $this->hasMany(MutasiInventarisPeralatan::class, 'id_inventaris_peralatan');
	}
}
