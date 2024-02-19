<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebPendudukMandiri
 * 
 * @property string $pin
 * @property int|null $config_id
 * @property Carbon|null $last_login
 * @property Carbon|null $tanggal_buat
 * @property int $id_pend
 * @property int|null $aktif
 * @property string|null $scan_ktp
 * @property string|null $scan_kk
 * @property string|null $foto_selfie
 * @property bool $ganti_pin
 * @property Carbon|null $email_verified_at
 * @property string|null $remember_token
 * @property Carbon|null $updated_at
 * 
 * @property TwebPenduduk $tweb_penduduk
 * @property Config|null $config
 *
 * @package App\Models
 */
class TwebPendudukMandiri extends Model
{
	protected $table = 'tweb_penduduk_mandiri';
	protected $primaryKey = 'id_pend';
	// public $incrementing = false;
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'last_login' => 'datetime',
		'tanggal_buat' => 'datetime',
		'id_pend' => 'int',
		'aktif' => 'int',
		'ganti_pin' => 'bool',
		'email_verified_at' => 'datetime'
	];

	protected $hidden = [
		'remember_token'
	];

	protected $fillable = [
		'pin',
		'config_id',
		'last_login',
		'tanggal_buat',
		'aktif',
		'scan_ktp',
		'scan_kk',
		'foto_selfie',
		'ganti_pin',
		'email_verified_at',
		'remember_token'
	];

	public function tweb_penduduk()
	{
		return $this->belongsTo(TwebPenduduk::class, 'id_pend');
	}

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
