<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IbuHamil
 * 
 * @property int $id_ibu_hamil
 * @property int|null $config_id
 * @property int $posyandu_id
 * @property int $kia_id
 * @property bool|null $status_kehamilan
 * @property int|null $usia_kehamilan
 * @property Carbon|null $tanggal_melahirkan
 * @property bool $pemeriksaan_kehamilan
 * @property bool $konsumsi_pil_fe
 * @property int $butir_pil_fe
 * @property bool $pemeriksaan_nifas
 * @property bool $konseling_gizi
 * @property bool $kunjungan_rumah
 * @property bool $akses_air_bersih
 * @property bool $kepemilikan_jamban
 * @property bool $jaminan_kesehatan
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class IbuHamil extends Model
{
	protected $table = 'ibu_hamil';
	protected $primaryKey = 'id_ibu_hamil';

	protected $casts = [
		'config_id' => 'int',
		'posyandu_id' => 'int',
		'kia_id' => 'int',
		'status_kehamilan' => 'bool',
		'usia_kehamilan' => 'int',
		'tanggal_melahirkan' => 'datetime',
		'pemeriksaan_kehamilan' => 'bool',
		'konsumsi_pil_fe' => 'bool',
		'butir_pil_fe' => 'int',
		'pemeriksaan_nifas' => 'bool',
		'konseling_gizi' => 'bool',
		'kunjungan_rumah' => 'bool',
		'akses_air_bersih' => 'bool',
		'kepemilikan_jamban' => 'bool',
		'jaminan_kesehatan' => 'bool',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'config_id',
		'posyandu_id',
		'kia_id',
		'status_kehamilan',
		'usia_kehamilan',
		'tanggal_melahirkan',
		'pemeriksaan_kehamilan',
		'konsumsi_pil_fe',
		'butir_pil_fe',
		'pemeriksaan_nifas',
		'konseling_gizi',
		'kunjungan_rumah',
		'akses_air_bersih',
		'kepemilikan_jamban',
		'jaminan_kesehatan',
		'created_by',
		'updated_by'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
