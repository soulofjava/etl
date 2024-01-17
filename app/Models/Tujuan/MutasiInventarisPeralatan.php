<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MutasiInventarisPeralatan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int|null $id_inventaris_peralatan
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
 * @property InventarisPeralatan|null $inventaris_peralatan
 * @property Config|null $config
 *
 * @package App\Models
 */
class MutasiInventarisPeralatan extends Model
{
	protected $table = 'mutasi_inventaris_peralatan';

	protected $casts = [
		'config_id' => 'int',
		'id_inventaris_peralatan' => 'int',
		'tahun_mutasi' => 'datetime',
		'harga_jual' => 'float',
		'created_by' => 'int',
		'updated_by' => 'int',
		'visible' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_inventaris_peralatan',
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

	public function inventaris_peralatan()
	{
		return $this->belongsTo(InventarisPeralatan::class, 'id_inventaris_peralatan');
	}

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
