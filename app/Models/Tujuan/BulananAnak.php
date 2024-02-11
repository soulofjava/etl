<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BulananAnak
 * 
 * @property int $id_bulanan_anak
 * @property int|null $config_id
 * @property int $posyandu_id
 * @property int $kia_id
 * @property bool $status_gizi
 * @property int $umur_bulan
 * @property bool $status_tikar
 * @property bool $pemberian_imunisasi_dasar
 * @property bool|null $pemberian_imunisasi_campak
 * @property bool $pengukuran_berat_badan
 * @property float|null $berat_badan
 * @property bool $pengukuran_tinggi_badan
 * @property float|null $tinggi_badan
 * @property bool $konseling_gizi_ayah
 * @property bool $konseling_gizi_ibu
 * @property bool $kunjungan_rumah
 * @property bool $air_bersih
 * @property bool $kepemilikan_jamban
 * @property bool $akta_lahir
 * @property bool $jaminan_kesehatan
 * @property bool $pengasuhan_paud
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class BulananAnak extends Model
{
	protected $table = 'bulanan_anak';
	protected $primaryKey = 'id_bulanan_anak';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'posyandu_id' => 'int',
		'kia_id' => 'int',
		'status_gizi' => 'bool',
		'umur_bulan' => 'int',
		'status_tikar' => 'bool',
		'pemberian_imunisasi_dasar' => 'bool',
		'pemberian_imunisasi_campak' => 'bool',
		'pengukuran_berat_badan' => 'bool',
		'berat_badan' => 'float',
		'pengukuran_tinggi_badan' => 'bool',
		'tinggi_badan' => 'float',
		'konseling_gizi_ayah' => 'bool',
		'konseling_gizi_ibu' => 'bool',
		'kunjungan_rumah' => 'bool',
		'air_bersih' => 'bool',
		'kepemilikan_jamban' => 'bool',
		'akta_lahir' => 'bool',
		'jaminan_kesehatan' => 'bool',
		'pengasuhan_paud' => 'bool',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'config_id',
		'posyandu_id',
		'kia_id',
		'status_gizi',
		'umur_bulan',
		'status_tikar',
		'pemberian_imunisasi_dasar',
		'pemberian_imunisasi_campak',
		'pengukuran_berat_badan',
		'berat_badan',
		'pengukuran_tinggi_badan',
		'tinggi_badan',
		'konseling_gizi_ayah',
		'konseling_gizi_ibu',
		'kunjungan_rumah',
		'air_bersih',
		'kepemilikan_jamban',
		'akta_lahir',
		'jaminan_kesehatan',
		'pengasuhan_paud',
		'created_by',
		'updated_by'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
