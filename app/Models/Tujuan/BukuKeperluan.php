<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BukuKeperluan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $keperluan
 * @property bool $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class BukuKeperluan extends Model
{
	protected $table = 'buku_keperluan';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'config_id',
		'keperluan',
		'status'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
