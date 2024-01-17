<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SysTraffic
 * 
 * @property Carbon $Tanggal
 * @property int|null $config_id
 * @property string $ipAddress
 * @property int $Jumlah
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class SysTraffic extends Model
{
	protected $table = 'sys_traffic';
	public $incrementing = false;
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'Tanggal' => 'datetime',
		'config_id' => 'int',
		'Jumlah' => 'int'
	];

	protected $fillable = [
		'ipAddress',
		'Jumlah'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
