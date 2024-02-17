<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AnalisisMaster
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama
 * @property int $subjek_tipe
 * @property bool $lock
 * @property string $deskripsi
 * @property string $kode_analisis
 * @property int|null $id_kelompok
 * @property string $pembagi
 * @property int|null $id_child
 * @property int|null $format_impor
 * @property int $jenis
 * @property string|null $gform_id
 * @property string|null $gform_nik_item_id
 * @property Carbon|null $gform_last_sync
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class AnalisisMaster extends Model
{
	protected $table = 'analisis_master';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'subjek_tipe' => 'int',
		'lock' => 'bool',
		'id_kelompok' => 'int',
		'id_child' => 'int',
		'format_impor' => 'int',
		'jenis' => 'int',
		'gform_last_sync' => 'datetime'
	];

	protected $fillable = [
		'config_id',
		'nama',
		'subjek_tipe',
		'lock',
		'deskripsi',
		'kode_analisis',
		'id_kelompok',
		'pembagi',
		'id_child',
		'format_impor',
		'jenis',
		'gform_id',
		'gform_nik_item_id',
		'gform_last_sync'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function analisisIndikator()
	{
		return $this->hasMany(AnalisisIndikator::class, 'id_master', 'id');
	}

	public function analisisKategoriIndikator()
	{
		return $this->hasMany(AnalisisKategoriIndikator::class, 'id_master', 'id');
	}

	public function analisisKlasifikasi()
	{
		return $this->hasMany(AnalisisKlasifikasi::class, 'id_master', 'id');
	}
	public function analisisPeriode()
	{
		return $this->hasMany(AnalisisPeriode::class, 'id_master', 'id');
	}
}
