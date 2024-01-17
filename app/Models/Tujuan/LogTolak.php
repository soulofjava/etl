<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogTolak
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_surat
 * @property string $keterangan
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class LogTolak extends Model
{
	protected $table = 'log_tolak';

	protected $casts = [
		'config_id' => 'int',
		'id_surat' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_surat',
		'keterangan',
		'created_by',
		'updated_by'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
