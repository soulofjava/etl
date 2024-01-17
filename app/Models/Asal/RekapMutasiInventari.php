<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RekapMutasiInventari
 * 
 * @property string $asset
 * @property int|null $config_id
 * @property int|null $id_inventaris_asset
 * @property string $status_mutasi
 * @property string|null $jenis_mutasi
 * @property Carbon $tahun_mutasi
 * @property string $keterangan
 *
 * @package App\Models
 */
class RekapMutasiInventari extends Model
{
	protected $table = 'rekap_mutasi_inventaris';
	public $incrementing = false;
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_inventaris_asset' => 'int',
		'tahun_mutasi' => 'datetime'
	];

	protected $fillable = [
		'asset',
		'config_id',
		'id_inventaris_asset',
		'status_mutasi',
		'jenis_mutasi',
		'tahun_mutasi',
		'keterangan'
	];
}
