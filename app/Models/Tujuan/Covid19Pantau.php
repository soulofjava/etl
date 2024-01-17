<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Covid19Pantau
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int|null $id_pemudik
 * @property Carbon|null $tanggal_jam
 * @property float|null $suhu_tubuh
 * @property string|null $batuk
 * @property string|null $flu
 * @property string|null $sesak_nafas
 * @property string|null $keluhan_lain
 * @property string|null $status_covid
 * 
 * @property Config|null $config
 * @property Covid19Pemudik|null $covid19_pemudik
 *
 * @package App\Models
 */
class Covid19Pantau extends Model
{
	protected $table = 'covid19_pantau';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_pemudik' => 'int',
		'tanggal_jam' => 'datetime',
		'suhu_tubuh' => 'float'
	];

	protected $fillable = [
		'config_id',
		'id_pemudik',
		'tanggal_jam',
		'suhu_tubuh',
		'batuk',
		'flu',
		'sesak_nafas',
		'keluhan_lain',
		'status_covid'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function covid19_pemudik()
	{
		return $this->belongsTo(Covid19Pemudik::class, 'id_pemudik');
	}
}
