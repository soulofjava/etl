<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KlasifikasiSurat
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $kode
 * @property string $nama
 * @property string $uraian
 * @property int $enabled
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class KlasifikasiSurat extends Model
{
	protected $table = 'klasifikasi_surat';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'enabled' => 'int'
	];

	protected $fillable = [
		'config_id',
		'kode',
		'nama',
		'uraian',
		'enabled'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
