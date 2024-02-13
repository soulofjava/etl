<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TanahDesa
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_penduduk
 * @property float|null $nik
 * @property string|null $jenis_pemilik
 * @property string $nama_pemilik_asal
 * @property int $luas
 * @property int|null $hak_milik
 * @property int|null $hak_guna_bangunan
 * @property int|null $hak_pakai
 * @property int|null $hak_guna_usaha
 * @property int|null $hak_pengelolaan
 * @property int|null $hak_milik_adat
 * @property int|null $hak_verponding
 * @property int|null $tanah_negara
 * @property int|null $perumahan
 * @property int|null $perdagangan_jasa
 * @property int|null $perkantoran
 * @property int|null $industri
 * @property int|null $fasilitas_umum
 * @property int|null $sawah
 * @property int|null $tegalan
 * @property int|null $perkebunan
 * @property int|null $peternakan_perikanan
 * @property int|null $hutan_belukar
 * @property int|null $hutan_lebat_lindung
 * @property int|null $tanah_kosong
 * @property int|null $lain
 * @property string $mutasi
 * @property string $keterangan
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property int $visible
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class TanahDesa extends Model
{
	protected $table = 'tanah_desa';
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_penduduk' => 'int',
		'nik' => 'float',
		'luas' => 'int',
		'hak_milik' => 'int',
		'hak_guna_bangunan' => 'int',
		'hak_pakai' => 'int',
		'hak_guna_usaha' => 'int',
		'hak_pengelolaan' => 'int',
		'hak_milik_adat' => 'int',
		'hak_verponding' => 'int',
		'tanah_negara' => 'int',
		'perumahan' => 'int',
		'perdagangan_jasa' => 'int',
		'perkantoran' => 'int',
		'industri' => 'int',
		'fasilitas_umum' => 'int',
		'sawah' => 'int',
		'tegalan' => 'int',
		'perkebunan' => 'int',
		'peternakan_perikanan' => 'int',
		'hutan_belukar' => 'int',
		'hutan_lebat_lindung' => 'int',
		'tanah_kosong' => 'int',
		'lain' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'visible' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_penduduk',
		'nik',
		'jenis_pemilik',
		'nama_pemilik_asal',
		'luas',
		'hak_milik',
		'hak_guna_bangunan',
		'hak_pakai',
		'hak_guna_usaha',
		'hak_pengelolaan',
		'hak_milik_adat',
		'hak_verponding',
		'tanah_negara',
		'perumahan',
		'perdagangan_jasa',
		'perkantoran',
		'industri',
		'fasilitas_umum',
		'sawah',
		'tegalan',
		'perkebunan',
		'peternakan_perikanan',
		'hutan_belukar',
		'hutan_lebat_lindung',
		'tanah_kosong',
		'lain',
		'mutasi',
		'keterangan',
		'created_by',
		'updated_by',
		'visible'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
