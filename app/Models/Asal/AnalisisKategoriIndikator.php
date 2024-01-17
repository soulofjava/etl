<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AnalisisKategoriIndikator
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_master
 * @property string $kategori
 * @property string|null $kategori_kode
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class AnalisisKategoriIndikator extends Model
{
	protected $table = 'analisis_kategori_indikator';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_master' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_master',
		'kategori',
		'kategori_kode'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
