<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SuratMasuk
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int|null $nomor_urut
 * @property Carbon $tanggal_penerimaan
 * @property string|null $nomor_surat
 * @property string|null $kode_surat
 * @property Carbon $tanggal_surat
 * @property string|null $pengirim
 * @property string|null $isi_singkat
 * @property string|null $isi_disposisi
 * @property string|null $berkas_scan
 * @property string|null $lokasi_arsip
 * 
 * @property Config|null $config
 * @property Collection|DisposisiSuratMasuk[] $disposisi_surat_masuks
 *
 * @package App\Models
 */
class SuratMasuk extends Model
{
	protected $table = 'surat_masuk';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'nomor_urut' => 'int',
		'tanggal_penerimaan' => 'datetime',
		'tanggal_surat' => 'datetime'
	];

	protected $fillable = [
		'config_id',
		'nomor_urut',
		'tanggal_penerimaan',
		'nomor_surat',
		'kode_surat',
		'tanggal_surat',
		'pengirim',
		'isi_singkat',
		'isi_disposisi',
		'berkas_scan',
		'lokasi_arsip'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function disposisi_surat_masuks()
	{
		return $this->hasMany(DisposisiSuratMasuk::class, 'id_surat_masuk');
	}
}
