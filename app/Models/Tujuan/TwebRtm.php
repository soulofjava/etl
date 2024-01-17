<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebRtm
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $nik_kepala
 * @property string $no_kk
 * @property Carbon $tgl_daftar
 * @property int|null $kelas_sosial
 * @property string|null $bdt
 * @property bool $terdaftar_dtks
 * 
 * @property Config|null $config
 * @property Collection|Dtk[] $dtks
 * @property Collection|DtksLampiran[] $dtks_lampirans
 *
 * @package App\Models
 */
class TwebRtm extends Model
{
	protected $table = 'tweb_rtm';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'nik_kepala' => 'int',
		'tgl_daftar' => 'datetime',
		'kelas_sosial' => 'int',
		'terdaftar_dtks' => 'bool'
	];

	protected $fillable = [
		'config_id',
		'nik_kepala',
		'no_kk',
		'tgl_daftar',
		'kelas_sosial',
		'bdt',
		'terdaftar_dtks'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function dtks()
	{
		return $this->hasMany(Dtk::class, 'id_rtm');
	}

	public function dtks_lampirans()
	{
		return $this->hasMany(DtksLampiran::class, 'id_rtm');
	}
}
