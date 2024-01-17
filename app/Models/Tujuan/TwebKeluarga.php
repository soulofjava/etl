<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebKeluarga
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string|null $no_kk
 * @property string|null $nik_kepala
 * @property Carbon|null $tgl_daftar
 * @property int|null $kelas_sosial
 * @property Carbon|null $tgl_cetak_kk
 * @property string|null $alamat
 * @property int $id_cluster
 * @property Carbon $updated_at
 * @property int $updated_by
 * 
 * @property Config|null $config
 * @property Collection|Dtk[] $dtks
 * @property Collection|DtksAnggotum[] $dtks_anggota
 *
 * @package App\Models
 */
class TwebKeluarga extends Model
{
	protected $table = 'tweb_keluarga';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'tgl_daftar' => 'datetime',
		'kelas_sosial' => 'int',
		'tgl_cetak_kk' => 'datetime',
		'id_cluster' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'config_id',
		'no_kk',
		'nik_kepala',
		'tgl_daftar',
		'kelas_sosial',
		'tgl_cetak_kk',
		'alamat',
		'id_cluster',
		'updated_by'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function dtks()
	{
		return $this->hasMany(Dtk::class, 'id_keluarga');
	}

	public function dtks_anggota()
	{
		return $this->hasMany(DtksAnggotum::class, 'id_keluarga');
	}
}
