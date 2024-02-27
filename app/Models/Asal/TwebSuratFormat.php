<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebSuratFormat
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama
 * @property string $url_surat
 * @property string|null $kode_surat
 * @property string|null $lampiran
 * @property bool $kunci
 * @property bool $favorit
 * @property int $jenis
 * @property bool|null $mandiri
 * @property int|null $masa_berlaku
 * @property string|null $satuan_masa_berlaku
 * @property bool $qr_code
 * @property bool $logo_garuda
 * @property bool $kecamatan
 * @property string|null $syarat_surat
 * @property string|null $template
 * @property string|null $template_desa
 * @property string|null $form_isian
 * @property string|null $kode_isian
 * @property string|null $orientasi
 * @property string|null $ukuran
 * @property string|null $margin
 * @property int $footer
 * @property int $header
 * @property string|null $format_nomor
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class TwebSuratFormat extends Model
{
	protected $table = 'tweb_surat_format';
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'kunci' => 'bool',
		'favorit' => 'bool',
		'jenis' => 'int',
		'mandiri' => 'bool',
		'masa_berlaku' => 'int',
		'qr_code' => 'bool',
		'logo_garuda' => 'bool',
		'kecamatan' => 'bool',
		'footer' => 'int',
		'header' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nama',
		'url_surat',
		'kode_surat',
		'lampiran',
		'kunci',
		'favorit',
		'jenis',
		'mandiri',
		'masa_berlaku',
		'satuan_masa_berlaku',
		'qr_code',
		'logo_garuda',
		'kecamatan',
		'syarat_surat',
		'template',
		'template_desa',
		'form_isian',
		'kode_isian',
		'orientasi',
		'ukuran',
		'margin',
		'footer',
		'header',
		'format_nomor',
		'created_by',
		'updated_by'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function log_surat()
	{
		return $this->hasMany(LogSurat::class, 'id_format_surat');
	}
}
