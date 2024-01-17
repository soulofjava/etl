<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DisposisiSuratMasuk
 * 
 * @property int $id_disposisi
 * @property int|null $config_id
 * @property int $id_surat_masuk
 * @property int|null $id_desa_pamong
 * @property string|null $disposisi_ke
 * 
 * @property TwebDesaPamong|null $tweb_desa_pamong
 * @property Config|null $config
 * @property SuratMasuk $surat_masuk
 *
 * @package App\Models
 */
class DisposisiSuratMasuk extends Model
{
	protected $table = 'disposisi_surat_masuk';
	protected $primaryKey = 'id_disposisi';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_surat_masuk' => 'int',
		'id_desa_pamong' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_surat_masuk',
		'id_desa_pamong',
		'disposisi_ke'
	];

	public function tweb_desa_pamong()
	{
		return $this->belongsTo(TwebDesaPamong::class, 'id_desa_pamong');
	}

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function surat_masuk()
	{
		return $this->belongsTo(SuratMasuk::class, 'id_surat_masuk');
	}
}
