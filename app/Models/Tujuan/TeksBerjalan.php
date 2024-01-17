<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TeksBerjalan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string|null $teks
 * @property int|null $urut
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property int|null $updated_by
 * @property int $status
 * @property int|null $tipe
 * @property string|null $tautan
 * @property string|null $judul_tautan
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class TeksBerjalan extends Model
{
	protected $table = 'teks_berjalan';

	protected $casts = [
		'config_id' => 'int',
		'urut' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'status' => 'int',
		'tipe' => 'int'
	];

	protected $fillable = [
		'config_id',
		'teks',
		'urut',
		'created_by',
		'updated_by',
		'status',
		'tipe',
		'tautan',
		'judul_tautan'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
