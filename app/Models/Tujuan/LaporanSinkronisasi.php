<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LaporanSinkronisasi
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string|null $tipe
 * @property string $judul
 * @property int $tahun
 * @property int $semester
 * @property string $nama_file
 * @property Carbon|null $kirim
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class LaporanSinkronisasi extends Model
{
	protected $table = 'laporan_sinkronisasi';
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'tahun' => 'string',
		'semester' => 'int',
		'kirim' => 'datetime'
	];

	protected $fillable = [
		'config_id',
		'tipe',
		'judul',
		'tahun',
		'semester',
		'nama_file',
		'kirim'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
