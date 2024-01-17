<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PesanDetail
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $pesan_id
 * @property string $text
 * @property string|null $pengirim
 * @property string|null $nama_pengirim
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class PesanDetail extends Model
{
	protected $table = 'pesan_detail';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'config_id' => 'int',
		'pesan_id' => 'int'
	];

	protected $fillable = [
		'config_id',
		'pesan_id',
		'text',
		'pengirim',
		'nama_pengirim'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
