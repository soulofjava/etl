<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MutasiInventarisGedung
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int|null $id_inventaris_gedung
 * @property string|null $jenis_mutasi
 * @property Carbon $tahun_mutasi
 * @property float|null $harga_jual
 * @property string|null $sumbangkan
 * @property string $keterangan
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property int $visible
 * @property string $status_mutasi
 * 
 * @property InventarisGedung|null $inventaris_gedung
 * @property Config|null $config
 *
 * @package App\Models
 */
class MutasiInventarisGedung extends Model
{
	protected $table = 'mutasi_inventaris_gedung';

	protected $casts = [
		'config_id' => 'int',
		'id_inventaris_gedung' => 'int',
		'tahun_mutasi' => 'datetime',
		'harga_jual' => 'float',
		'created_by' => 'int',
		'updated_by' => 'int',
		'visible' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_inventaris_gedung',
		'jenis_mutasi',
		'tahun_mutasi',
		'harga_jual',
		'sumbangkan',
		'keterangan',
		'created_by',
		'updated_by',
		'visible',
		'status_mutasi'
	];

	public function inventaris_gedung()
	{
		return $this->belongsTo(InventarisGedung::class, 'id_inventaris_gedung');
	}

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
