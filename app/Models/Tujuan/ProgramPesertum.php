<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProgramPesertum
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $peserta
 * @property int $program_id
 * @property string|null $no_id_kartu
 * @property string $kartu_nik
 * @property string $kartu_nama
 * @property string $kartu_tempat_lahir
 * @property Carbon $kartu_tanggal_lahir
 * @property string $kartu_alamat
 * @property string|null $kartu_peserta
 * @property int|null $kartu_id_pend
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class ProgramPesertum extends Model
{
	protected $table = 'program_peserta';

	protected $casts = [
		'config_id' => 'int',
		'program_id' => 'int',
		'kartu_tanggal_lahir' => 'datetime',
		'kartu_id_pend' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'config_id',
		'peserta',
		'program_id',
		'no_id_kartu',
		'kartu_nik',
		'kartu_nama',
		'kartu_tempat_lahir',
		'kartu_tanggal_lahir',
		'kartu_alamat',
		'kartu_peserta',
		'kartu_id_pend',
		'created_by',
		'updated_by'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
