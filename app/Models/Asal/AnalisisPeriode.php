<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AnalisisPeriode
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_master
 * @property string $nama
 * @property int $id_state
 * @property bool $aktif
 * @property string $keterangan
 * @property Carbon $tahun_pelaksanaan
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class AnalisisPeriode extends Model
{
	protected $table = 'analisis_periode';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_master' => 'int',
		'id_state' => 'int',
		'aktif' => 'bool',
		'tahun_pelaksanaan' => 'string'
		// 'tahun_pelaksanaan' => 'datetime' truncate data tidak sesuai database "2018" mwnjadi "1970-01-01T00:32:50.000000Z" dirubah string
	];

	protected $fillable = [
		'config_id',
		'id_master',
		'nama',
		'id_state',
		'aktif',
		'keterangan',
		'tahun_pelaksanaan'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
