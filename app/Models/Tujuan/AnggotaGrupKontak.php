<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AnggotaGrupKontak
 * 
 * @property int $id_grup_kontak
 * @property int|null $config_id
 * @property int $id_grup
 * @property int|null $id_kontak
 * @property int|null $id_penduduk
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Config|null $config
 * @property TwebPenduduk|null $tweb_penduduk
 * @property Kontak|null $kontak
 * @property KontakGrup $kontak_grup
 *
 * @package App\Models
 */
class AnggotaGrupKontak extends Model
{
	protected $table = 'anggota_grup_kontak';
	public $timestamps = false;
	protected $connection = "tujuan";
	protected $primaryKey = 'id_grup_kontak';

	protected $casts = [
		'config_id' => 'int',
		'id_grup' => 'int',
		'id_kontak' => 'int',
		'id_penduduk' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_grup',
		'id_kontak',
		'id_penduduk'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function tweb_penduduk()
	{
		return $this->belongsTo(TwebPenduduk::class, 'id_penduduk');
	}

	public function kontak()
	{
		return $this->belongsTo(Kontak::class, 'id_kontak');
	}

	public function kontak_grup()
	{
		return $this->belongsTo(KontakGrup::class, 'id_grup');
	}
}
