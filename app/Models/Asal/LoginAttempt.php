<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LoginAttempt
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $username
 * @property string $ip_address
 * @property int $time
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class LoginAttempt extends Model
{
	protected $table = 'login_attempts';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'time' => 'int'
	];

	protected $fillable = [
		'config_id',
		'username',
		'ip_address',
		'time'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
