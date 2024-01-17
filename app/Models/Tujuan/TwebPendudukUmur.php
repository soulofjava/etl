<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebPendudukUmur
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string|null $nama
 * @property int|null $dari
 * @property int|null $sampai
 * @property int|null $status
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class TwebPendudukUmur extends Model
{
	protected $table = 'tweb_penduduk_umur';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'dari' => 'int',
		'sampai' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nama',
		'dari',
		'sampai',
		'status'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
