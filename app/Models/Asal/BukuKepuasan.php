<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BukuKepuasan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_nama
 * @property int $id_pertanyaan
 * @property int $id_jawaban
 * @property string|null $pertanyaan_statis
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class BukuKepuasan extends Model
{
	protected $table = 'buku_kepuasan';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_nama' => 'int',
		'id_pertanyaan' => 'int',
		'id_jawaban' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_nama',
		'id_pertanyaan',
		'id_jawaban',
		'pertanyaan_statis'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
