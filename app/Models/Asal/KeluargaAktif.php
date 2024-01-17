<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KeluargaAktif
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
 * @package App\Models
 */
class KeluargaAktif extends Model
{
	protected $table = 'keluarga_aktif';
	public $incrementing = false;
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'id' => 'int',
		'config_id' => 'int',
		'tgl_daftar' => 'datetime',
		'kelas_sosial' => 'int',
		'tgl_cetak_kk' => 'datetime',
		'id_cluster' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'id',
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
}
