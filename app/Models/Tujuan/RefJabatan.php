<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RefJabatan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama
 * @property string|null $tupoksi
 * @property bool $jenis
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class RefJabatan extends Model
{
	protected $table = 'ref_jabatan';
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'jenis' => 'bool',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nama',
		'tupoksi',
		'jenis',
		'created_by',
		'updated_by'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
