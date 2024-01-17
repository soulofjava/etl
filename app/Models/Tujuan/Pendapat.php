<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pendapat
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $pengguna
 * @property Carbon $tanggal
 * @property int $pilihan
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Pendapat extends Model
{
	protected $table = 'pendapat';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'tanggal' => 'datetime',
		'pilihan' => 'int'
	];

	protected $fillable = [
		'config_id',
		'pengguna',
		'tanggal',
		'pilihan'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
