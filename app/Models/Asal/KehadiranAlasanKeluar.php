<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KehadiranAlasanKeluar
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $alasan
 * @property string|null $keterangan
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class KehadiranAlasanKeluar extends Model
{
	protected $table = 'kehadiran_alasan_keluar';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'config_id',
		'alasan',
		'keterangan',
		'created_by',
		'updated_by'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
