<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Url
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $url
 * @property string $alias
 * @property Carbon $created
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Url extends Model
{
	protected $table = 'urls';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'created' => 'datetime'
	];

	protected $fillable = [
		'config_id',
		'url',
		'alias',
		'created'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
