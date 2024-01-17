<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KontakGrup
 * 
 * @property int $id_grup
 * @property int|null $config_id
 * @property string $nama_grup
 * @property string|null $keterangan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Config|null $config
 * @property Collection|AnggotaGrupKontak[] $anggota_grup_kontaks
 * @property Collection|HubungWarga[] $hubung_wargas
 *
 * @package App\Models
 */
class KontakGrup extends Model
{
	protected $table = 'kontak_grup';
	protected $primaryKey = 'id_grup';

	protected $casts = [
		'config_id' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nama_grup',
		'keterangan'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function anggota_grup_kontaks()
	{
		return $this->hasMany(AnggotaGrupKontak::class, 'id_grup');
	}

	public function hubung_wargas()
	{
		return $this->hasMany(HubungWarga::class, 'id_grup');
	}
}
