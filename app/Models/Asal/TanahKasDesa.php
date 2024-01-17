<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TanahKasDesa
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama_pemilik_asal
 * @property string $letter_c
 * @property string $kelas
 * @property int $luas
 * @property int|null $asli_milik_desa
 * @property int|null $pemerintah
 * @property int|null $provinsi
 * @property int|null $kabupaten_kota
 * @property int|null $lain_lain
 * @property int|null $sawah
 * @property int|null $tegal
 * @property int|null $kebun
 * @property int|null $tambak_kolam
 * @property int|null $tanah_kering_darat
 * @property int|null $ada_patok
 * @property int|null $tidak_ada_patok
 * @property int|null $ada_papan_nama
 * @property int|null $tidak_ada_papan_nama
 * @property Carbon|null $tanggal_perolehan
 * @property string $lokasi
 * @property string $peruntukan
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
class TanahKasDesa extends Model
{
	protected $table = 'tanah_kas_desa';

	protected $casts = [
		'config_id' => 'int',
		'luas' => 'int',
		'asli_milik_desa' => 'int',
		'pemerintah' => 'int',
		'provinsi' => 'int',
		'kabupaten_kota' => 'int',
		'lain_lain' => 'int',
		'sawah' => 'int',
		'tegal' => 'int',
		'kebun' => 'int',
		'tambak_kolam' => 'int',
		'tanah_kering_darat' => 'int',
		'ada_patok' => 'int',
		'tidak_ada_patok' => 'int',
		'ada_papan_nama' => 'int',
		'tidak_ada_papan_nama' => 'int',
		'tanggal_perolehan' => 'datetime',
		'created_by' => 'int',
		'updated_by' => 'int',
		'visible' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nama_pemilik_asal',
		'letter_c',
		'kelas',
		'luas',
		'asli_milik_desa',
		'pemerintah',
		'provinsi',
		'kabupaten_kota',
		'lain_lain',
		'sawah',
		'tegal',
		'kebun',
		'tambak_kolam',
		'tanah_kering_darat',
		'ada_patok',
		'tidak_ada_patok',
		'ada_papan_nama',
		'tidak_ada_papan_nama',
		'tanggal_perolehan',
		'lokasi',
		'peruntukan',
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
