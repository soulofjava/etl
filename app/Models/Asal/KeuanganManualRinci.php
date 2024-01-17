<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganManualRinci
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $Tahun
 * @property string $Kd_Akun
 * @property string $Kd_Keg
 * @property string $Kd_Rincian
 * @property float $Nilai_Anggaran
 * @property float $Nilai_Realisasi
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class KeuanganManualRinci extends Model
{
	protected $table = 'keuangan_manual_rinci';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'Nilai_Anggaran' => 'float',
		'Nilai_Realisasi' => 'float'
	];

	protected $fillable = [
		'config_id',
		'Tahun',
		'Kd_Akun',
		'Kd_Keg',
		'Kd_Rincian',
		'Nilai_Anggaran',
		'Nilai_Realisasi'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
