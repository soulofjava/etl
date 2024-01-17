<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AnalisisResponBukti
 * 
 * @property int $id_master
 * @property int|null $config_id
 * @property int $id_periode
 * @property int $id_subjek
 * @property string $pengesahan
 * @property Carbon $tgl_update
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class AnalisisResponBukti extends Model
{
	protected $table = 'analisis_respon_bukti';
	public $incrementing = false;
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'id_master' => 'int',
		'config_id' => 'int',
		'id_periode' => 'int',
		'id_subjek' => 'int',
		'tgl_update' => 'datetime'
	];

	protected $fillable = [
		'id_master',
		'config_id',
		'id_periode',
		'id_subjek',
		'pengesahan',
		'tgl_update'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
