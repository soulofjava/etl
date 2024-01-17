<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BukuPertanyaan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string|null $pertanyaan
 * @property bool $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class BukuPertanyaan extends Model
{
	protected $table = 'buku_pertanyaan';

	protected $casts = [
		'config_id' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'config_id',
		'pertanyaan',
		'status'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
