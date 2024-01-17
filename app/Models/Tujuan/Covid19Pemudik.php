<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Covid19Pemudik
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int|null $id_terdata
 * @property bool $pantau
 * @property Carbon|null $tanggal_datang
 * @property string|null $asal_mudik
 * @property string|null $durasi_mudik
 * @property string|null $tujuan_mudik
 * @property string|null $keluhan_kesehatan
 * @property string|null $status_covid
 * @property string|null $no_hp
 * @property string|null $email
 * @property string|null $keterangan
 * @property string|null $is_wajib_pantau
 * 
 * @property Config|null $config
 * @property TwebPenduduk|null $tweb_penduduk
 * @property Collection|Covid19Pantau[] $covid19_pantaus
 *
 * @package App\Models
 */
class Covid19Pemudik extends Model
{
	protected $table = 'covid19_pemudik';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_terdata' => 'int',
		'pantau' => 'bool',
		'tanggal_datang' => 'datetime'
	];

	protected $fillable = [
		'config_id',
		'id_terdata',
		'pantau',
		'tanggal_datang',
		'asal_mudik',
		'durasi_mudik',
		'tujuan_mudik',
		'keluhan_kesehatan',
		'status_covid',
		'no_hp',
		'email',
		'keterangan',
		'is_wajib_pantau'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function tweb_penduduk()
	{
		return $this->belongsTo(TwebPenduduk::class, 'id_terdata');
	}

	public function covid19_pantaus()
	{
		return $this->hasMany(Covid19Pantau::class, 'id_pemudik');
	}
}
