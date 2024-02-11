<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pesan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string|null $judul
 * @property string $jenis
 * @property int $sudah_dibaca
 * @property int $diarsipkan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Pesan extends Model
{
	protected $table = 'pesan';
	public $incrementing = false;
	protected $connection = "tujuan";

	protected $casts = [
		'id' => 'int',
		'config_id' => 'int',
		'sudah_dibaca' => 'int',
		'diarsipkan' => 'int'
	];

	protected $fillable = [
		'id',
		'config_id',
		'judul',
		'jenis',
		'sudah_dibaca',
		'diarsipkan'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
