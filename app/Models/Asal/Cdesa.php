<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cdesa
 *
 * @property int $id
 * @property int|null $config_id
 * @property string $nomor
 * @property string $nama_kepemilikan
 * @property bool $jenis_pemilik
 * @property string|null $nama_pemilik_luar
 * @property string|null $alamat_pemilik_luar
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property int $updated_by
 *
 * @property Config|null $config
 * @property Collection|CdesaPenduduk[] $cdesa_penduduks
 * @property Collection|MutasiCdesa[] $mutasi_cdesas
 *
 * @package App\Models
 */
class Cdesa extends Model
{
	protected $table = 'cdesa';
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'jenis_pemilik' => 'bool',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nomor',
		'nama_kepemilikan',
		'jenis_pemilik',
		'nama_pemilik_luar',
		'alamat_pemilik_luar',
		'created_by',
		'updated_by'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function cdesa_penduduks()
	{
		return $this->hasMany(CdesaPenduduk::class, 'id_cdesa');
	}

	public function mutasi_cdesas()
	{
		return $this->hasMany(MutasiCdesa::class, 'id_cdesa_masuk');
	}
}
