<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Statistic
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $url_id
 * @property Carbon $created
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Statistic extends Model
{
	protected $table = 'statistics';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'url_id' => 'int',
		'created' => 'datetime'
	];

	protected $fillable = [
		'config_id',
		'url_id',
		'created'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
