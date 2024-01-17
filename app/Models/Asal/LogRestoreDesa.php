<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogRestoreDesa
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string|null $ukuran
 * @property string|null $path
 * @property Carbon|null $restore_at
 * @property int $status
 * @property int|null $pid_process
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class LogRestoreDesa extends Model
{
	protected $table = 'log_restore_desa';

	protected $casts = [
		'config_id' => 'int',
		'restore_at' => 'datetime',
		'status' => 'int',
		'pid_process' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'config_id',
		'ukuran',
		'path',
		'restore_at',
		'status',
		'pid_process',
		'created_by',
		'updated_by'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
