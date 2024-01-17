<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pembangunan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int|null $id_lokasi
 * @property string|null $sumber_dana
 * @property string|null $judul
 * @property string|null $slug
 * @property string|null $keterangan
 * @property string|null $lokasi
 * @property string|null $lat
 * @property string|null $lng
 * @property string|null $volume
 * @property Carbon|null $tahun_anggaran
 * @property string|null $pelaksana_kegiatan
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $foto
 * @property int|null $anggaran
 * @property int|null $perubahan_anggaran
 * @property int|null $sumber_biaya_pemerintah
 * @property int|null $sumber_biaya_provinsi
 * @property int|null $sumber_biaya_kab_kota
 * @property int|null $sumber_biaya_swadaya
 * @property int|null $sumber_biaya_jumlah
 * @property string|null $manfaat
 * @property int|null $waktu
 * @property bool $satuan_waktu
 * @property string|null $sifat_proyek
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Pembangunan extends Model
{
	protected $table = 'pembangunan';

	protected $casts = [
		'config_id' => 'int',
		'id_lokasi' => 'int',
		'tahun_anggaran' => 'datetime',
		'status' => 'int',
		'anggaran' => 'int',
		'perubahan_anggaran' => 'int',
		'sumber_biaya_pemerintah' => 'int',
		'sumber_biaya_provinsi' => 'int',
		'sumber_biaya_kab_kota' => 'int',
		'sumber_biaya_swadaya' => 'int',
		'sumber_biaya_jumlah' => 'int',
		'waktu' => 'int',
		'satuan_waktu' => 'bool'
	];

	protected $fillable = [
		'config_id',
		'id_lokasi',
		'sumber_dana',
		'judul',
		'slug',
		'keterangan',
		'lokasi',
		'lat',
		'lng',
		'volume',
		'tahun_anggaran',
		'pelaksana_kegiatan',
		'status',
		'foto',
		'anggaran',
		'perubahan_anggaran',
		'sumber_biaya_pemerintah',
		'sumber_biaya_provinsi',
		'sumber_biaya_kab_kota',
		'sumber_biaya_swadaya',
		'sumber_biaya_jumlah',
		'manfaat',
		'waktu',
		'satuan_waktu',
		'sifat_proyek'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
