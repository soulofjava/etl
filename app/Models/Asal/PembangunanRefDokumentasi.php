<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PembangunanRefDokumentasi
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_pembangunan
 * @property string|null $gambar
 * @property string|null $persentase
 * @property string|null $keterangan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class PembangunanRefDokumentasi extends Model
{
	protected $table = 'pembangunan_ref_dokumentasi';

	protected $casts = [
		'config_id' => 'int',
		'id_pembangunan' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_pembangunan',
		'gambar',
		'persentase',
		'keterangan'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
