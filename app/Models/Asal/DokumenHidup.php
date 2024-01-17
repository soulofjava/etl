<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DokumenHidup
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string|null $satuan
 * @property string $nama
 * @property int $enabled
 * @property Carbon $tgl_upload
 * @property int $id_pend
 * @property int $kategori
 * @property string $attr
 * @property int|null $tipe
 * @property string|null $url
 * @property int|null $tahun
 * @property int|null $kategori_info_publik
 * @property Carbon $updated_at
 * @property bool $deleted
 * @property int|null $id_syarat
 * @property int|null $id_parent
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property bool|null $dok_warga
 * @property string|null $lokasi_arsip
 *
 * @package App\Models
 */
class DokumenHidup extends Model
{
	protected $table = 'dokumen_hidup';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'config_id' => 'int',
		'enabled' => 'int',
		'tgl_upload' => 'datetime',
		'id_pend' => 'int',
		'kategori' => 'int',
		'tipe' => 'int',
		'tahun' => 'int',
		'kategori_info_publik' => 'int',
		'deleted' => 'bool',
		'id_syarat' => 'int',
		'id_parent' => 'int',
		'dok_warga' => 'bool'
	];

	protected $fillable = [
		'id',
		'config_id',
		'satuan',
		'nama',
		'enabled',
		'tgl_upload',
		'id_pend',
		'kategori',
		'attr',
		'tipe',
		'url',
		'tahun',
		'kategori_info_publik',
		'deleted',
		'id_syarat',
		'id_parent',
		'created_by',
		'updated_by',
		'dok_warga',
		'lokasi_arsip'
	];
}
