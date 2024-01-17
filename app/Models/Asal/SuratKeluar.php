<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SuratKeluar
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int|null $nomor_urut
 * @property string|null $nomor_surat
 * @property string|null $kode_surat
 * @property Carbon $tanggal_surat
 * @property Carbon $tanggal_catat
 * @property string|null $tujuan
 * @property string|null $isi_singkat
 * @property string|null $berkas_scan
 * @property bool|null $ekspedisi
 * @property Carbon|null $tanggal_pengiriman
 * @property string|null $tanda_terima
 * @property string|null $keterangan
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property string|null $lokasi_arsip
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class SuratKeluar extends Model
{
	protected $table = 'surat_keluar';

	protected $casts = [
		'config_id' => 'int',
		'nomor_urut' => 'int',
		'tanggal_surat' => 'datetime',
		'tanggal_catat' => 'datetime',
		'ekspedisi' => 'bool',
		'tanggal_pengiriman' => 'datetime',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nomor_urut',
		'nomor_surat',
		'kode_surat',
		'tanggal_surat',
		'tanggal_catat',
		'tujuan',
		'isi_singkat',
		'berkas_scan',
		'ekspedisi',
		'tanggal_pengiriman',
		'tanda_terima',
		'keterangan',
		'created_by',
		'updated_by',
		'lokasi_arsip'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
