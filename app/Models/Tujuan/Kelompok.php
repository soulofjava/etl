<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Kelompok
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_master
 * @property int $id_ketua
 * @property string $nama
 * @property string|null $slug
 * @property string|null $keterangan
 * @property string $kode
 * @property string|null $tipe
 * 
 * @property Config|null $config
 * @property KelompokMaster $kelompok_master
 * @property Collection|KelompokAnggotum[] $kelompok_anggota
 *
 * @package App\Models
 */
class Kelompok extends Model
{
	protected $table = 'kelompok';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_master' => 'int',
		'id_ketua' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_master',
		'id_ketua',
		'nama',
		'slug',
		'keterangan',
		'kode',
		'tipe'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function kelompok_master()
	{
		return $this->belongsTo(KelompokMaster::class, 'id_master');
	}

	public function kelompok_anggota()
	{
		return $this->hasMany(KelompokAnggotum::class, 'id_kelompok');
	}
}
