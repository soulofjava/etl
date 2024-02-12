<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Covid19Vaksin
 * 
 * @property int $id_penduduk
 * @property int|null $config_id
 * @property int|null $vaksin_1
 * @property Carbon|null $tgl_vaksin_1
 * @property string|null $dokumen_vaksin_1
 * @property string|null $jenis_vaksin_1
 * @property int|null $vaksin_2
 * @property Carbon|null $tgl_vaksin_2
 * @property string|null $dokumen_vaksin_2
 * @property string|null $jenis_vaksin_2
 * @property int|null $vaksin_3
 * @property Carbon|null $tgl_vaksin_3
 * @property string|null $dokumen_vaksin_3
 * @property string|null $jenis_vaksin_3
 * @property int|null $tunda
 * @property string|null $keterangan
 * @property string|null $surat_dokter
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Covid19Vaksin extends Model
{
	protected $table = 'covid19_vaksin';
	protected $primaryKey = 'id_penduduk';
	public $incrementing = false;
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'id_penduduk' => 'int',
		'config_id' => 'int',
		'vaksin_1' => 'int',
		'tgl_vaksin_1' => 'datetime',
		'vaksin_2' => 'int',
		'tgl_vaksin_2' => 'datetime',
		'vaksin_3' => 'int',
		'tgl_vaksin_3' => 'datetime',
		'tunda' => 'int'
	];

	protected $fillable = [
		'id_penduduk',
		'config_id',
		'vaksin_1',
		'tgl_vaksin_1',
		'dokumen_vaksin_1',
		'jenis_vaksin_1',
		'vaksin_2',
		'tgl_vaksin_2',
		'dokumen_vaksin_2',
		'jenis_vaksin_2',
		'vaksin_3',
		'tgl_vaksin_3',
		'dokumen_vaksin_3',
		'jenis_vaksin_3',
		'tunda',
		'keterangan',
		'surat_dokter'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
