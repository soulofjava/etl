<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AnalisisIndikator
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_master
 * @property string|null $nomor
 * @property string $pertanyaan
 * @property int $id_tipe
 * @property int $bobot
 * @property int $act_analisis
 * @property int $id_kategori
 * @property bool $is_publik
 * @property bool $is_teks
 * @property string|null $referensi
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class AnalisisIndikator extends Model
{
	protected $table = 'analisis_indikator';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_master' => 'int',
		'id_tipe' => 'int',
		'bobot' => 'int',
		'act_analisis' => 'int',
		'id_kategori' => 'int',
		'is_publik' => 'bool',
		'is_teks' => 'bool'
	];

	protected $fillable = [
		'config_id',
		'id_master',
		'nomor',
		'pertanyaan',
		'id_tipe',
		'bobot',
		'act_analisis',
		'id_kategori',
		'is_publik',
		'is_teks',
		'referensi'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
