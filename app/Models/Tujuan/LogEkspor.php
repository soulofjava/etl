<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogEkspor
 * 
 * @property int $id
 * @property Carbon $tgl_ekspor
 * @property string $kode_ekspor
 * @property int $semua
 * @property Carbon|null $dari_tgl
 * @property int $total
 *
 * @package App\Models
 */
class LogEkspor extends Model
{
	protected $table = 'log_ekspor';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'tgl_ekspor' => 'datetime',
		'semua' => 'int',
		'dari_tgl' => 'datetime',
		'total' => 'int'
	];

	protected $fillable = [
		'tgl_ekspor',
		'kode_ekspor',
		'semua',
		'dari_tgl',
		'total'
	];
}
