<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogPenduduk
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_pend
 * @property int|null $kode_peristiwa
 * @property string|null $meninggal_di
 * @property string|null $jam_mati
 * @property string|null $sebab
 * @property string|null $penolong_mati
 * @property string|null $akta_mati
 * @property string|null $alamat_tujuan
 * @property Carbon $tgl_lapor
 * @property Carbon|null $tgl_peristiwa
 * @property string|null $catatan
 * @property string|null $no_kk
 * @property string|null $nama_kk
 * @property int|null $ref_pindah
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * @property string|null $maksud_tujuan_kedatangan
 * 
 * @property TwebPenduduk $tweb_penduduk
 * @property Config|null $config
 * @property Collection|LogKeluarga[] $log_keluargas
 *
 * @package App\Models
 */
class LogPenduduk extends Model
{
	protected $table = 'log_penduduk';

	protected $casts = [
		'config_id' => 'int',
		'id_pend' => 'int',
		'kode_peristiwa' => 'int',
		'tgl_lapor' => 'datetime',
		'tgl_peristiwa' => 'datetime',
		'ref_pindah' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_pend',
		'kode_peristiwa',
		'meninggal_di',
		'jam_mati',
		'sebab',
		'penolong_mati',
		'akta_mati',
		'alamat_tujuan',
		'tgl_lapor',
		'tgl_peristiwa',
		'catatan',
		'no_kk',
		'nama_kk',
		'ref_pindah',
		'created_by',
		'updated_by',
		'maksud_tujuan_kedatangan'
	];

	public function tweb_penduduk()
	{
		return $this->belongsTo(TwebPenduduk::class, 'id_pend');
	}

	public function ref_pindah()
	{
		return $this->belongsTo(RefPindah::class, 'ref_pindah');
	}

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function log_keluargas()
	{
		return $this->hasMany(LogKeluarga::class, 'id_log_penduduk');
	}
}
