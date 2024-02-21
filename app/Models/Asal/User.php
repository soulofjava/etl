<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string|null $username
 * @property string $password
 * @property int $id_grup
 * @property int|null $pamong_id
 * @property string|null $email
 * @property Carbon|null $last_login
 * @property Carbon|null $email_verified_at
 * @property bool|null $active
 * @property string|null $nama
 * @property string $id_telegram
 * @property string|null $token
 * @property Carbon|null $token_exp
 * @property Carbon|null $telegram_verified_at
 * @property bool $notif_telegram
 * @property string|null $company
 * @property string|null $phone
 * @property string|null $foto
 * @property string $session
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'user';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_grup' => 'int',
		'pamong_id' => 'int',
		'last_login' => 'datetime',
		'email_verified_at' => 'datetime',
		'active' => 'bool',
		'token_exp' => 'datetime',
		'telegram_verified_at' => 'datetime',
		'notif_telegram' => 'bool'
	];

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'config_id',
		'username',
		'password',
		'id_grup',
		'pamong_id',
		'email',
		'last_login',
		'email_verified_at',
		'active',
		'nama',
		'id_telegram',
		'token',
		'token_exp',
		'telegram_verified_at',
		'notif_telegram',
		'company',
		'phone',
		'foto',
		'session'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function user_grup()
	{
		return $this->hasOne(UserGrup::class, 'id', 'id_grup');
	}

	public function artikel()
	{
		return $this->hasMany(Artikel::class, 'id_user');
	}
}
