<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Posyandu
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama
 * @property string $alamat
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Posyandu extends Model
{
	protected $table = 'posyandu';
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

    protected $guarded = [];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
