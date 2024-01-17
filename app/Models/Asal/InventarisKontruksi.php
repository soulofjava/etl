<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InventarisKontruksi
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama_barang
 * @property string $kondisi_bangunan
 * @property string $kontruksi_bertingkat
 * @property bool|null $kontruksi_beton
 * @property int $luas_bangunan
 * @property string $letak
 * @property Carbon|null $tanggal_dokument
 * @property string|null $no_dokument
 * @property Carbon|null $tanggal
 * @property string|null $status_tanah
 * @property string|null $kode_tanah
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
 *
 * @package App\Models
 */
class InventarisKontruksi extends Model
{
	protected $table = 'inventaris_kontruksi';

	protected $casts = [
		'config_id' => 'int',
		'kontruksi_beton' => 'bool',
		'luas_bangunan' => 'int',
		'tanggal_dokument' => 'datetime',
		'tanggal' => 'datetime',
		'harga' => 'float',
		'created_by' => 'int',
		'updated_by' => 'int',
		'status' => 'int',
		'visible' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nama_barang',
		'kondisi_bangunan',
		'kontruksi_bertingkat',
		'kontruksi_beton',
		'luas_bangunan',
		'letak',
		'tanggal_dokument',
		'no_dokument',
		'tanggal',
		'status_tanah',
		'kode_tanah',
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
}
