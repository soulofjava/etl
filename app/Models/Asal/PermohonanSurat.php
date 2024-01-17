<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PermohonanSurat
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_pemohon
 * @property int $id_surat
 * @property string $isian_form
 * @property bool $status
 * @property string|null $alasan
 * @property string|null $keterangan
 * @property string $no_hp_aktif
 * @property string $syarat
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $no_antrian
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class PermohonanSurat extends Model
{
	protected $table = 'permohonan_surat';

	protected $casts = [
		'config_id' => 'int',
		'id_pemohon' => 'int',
		'id_surat' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'config_id',
		'id_pemohon',
		'id_surat',
		'isian_form',
		'status',
		'alasan',
		'keterangan',
		'no_hp_aktif',
		'syarat',
		'no_antrian'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
