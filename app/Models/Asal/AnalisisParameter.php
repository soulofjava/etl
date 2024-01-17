<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AnalisisParameter
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_indikator
 * @property string $jawaban
 * @property int $nilai
 * @property int|null $kode_jawaban
 * @property bool $asign
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class AnalisisParameter extends Model
{
	protected $table = 'analisis_parameter';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_indikator' => 'int',
		'nilai' => 'int',
		'kode_jawaban' => 'int',
		'asign' => 'bool'
	];

	protected $fillable = [
		'config_id',
		'id_indikator',
		'jawaban',
		'nilai',
		'kode_jawaban',
		'asign'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
