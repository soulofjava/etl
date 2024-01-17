<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Kontak
 * 
 * @property int $id_kontak
 * @property int|null $config_id
 * @property string $nama
 * @property string|null $telepon
 * @property string|null $email
 * @property string|null $telegram
 * @property string $hubung_warga
 * @property string|null $keterangan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Config|null $config
 * @property Collection|AnggotaGrupKontak[] $anggota_grup_kontaks
 *
 * @package App\Models
 */
class Kontak extends Model
{
	protected $table = 'kontak';
	protected $primaryKey = 'id_kontak';

	protected $casts = [
		'config_id' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nama',
		'telepon',
		'email',
		'telegram',
		'hubung_warga',
		'keterangan'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function anggota_grup_kontaks()
	{
		return $this->hasMany(AnggotaGrupKontak::class, 'id_kontak');
	}
}
