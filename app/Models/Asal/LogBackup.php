<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogBackup
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string|null $ukuran
 * @property string|null $path
 * @property bool $permanen
 * @property Carbon|null $downloaded_at
 * @property int $status
 * @property int $pid_process
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class LogBackup extends Model
{
	protected $table = 'log_backup';

	protected $casts = [
		'config_id' => 'int',
		'permanen' => 'bool',
		'downloaded_at' => 'datetime',
		'status' => 'int',
		'pid_process' => 'int'
	];

	protected $fillable = [
		'config_id',
		'ukuran',
		'path',
		'permanen',
		'downloaded_at',
		'status',
		'pid_process'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
