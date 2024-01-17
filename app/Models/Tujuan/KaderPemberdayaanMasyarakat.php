<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KaderPemberdayaanMasyarakat
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $penduduk_id
 * @property string|null $kursus
 * @property string|null $bidang
 * @property string|null $keterangan
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class KaderPemberdayaanMasyarakat extends Model
{
	protected $table = 'kader_pemberdayaan_masyarakat';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'penduduk_id' => 'int'
	];

	protected $fillable = [
		'config_id',
		'penduduk_id',
		'kursus',
		'bidang',
		'keterangan'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
