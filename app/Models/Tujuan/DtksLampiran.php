<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DtksLampiran
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int|null $id_rtm
 * @property string $judul
 * @property string $keterangan
 * @property string $foto
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property TwebRtm|null $tweb_rtm
 * @property Config|null $config
 * @property Collection|DtksRefLampiran[] $dtks_ref_lampirans
 *
 * @package App\Models
 */
class DtksLampiran extends Model
{
	protected $table = 'dtks_lampiran';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_rtm' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_rtm',
		'judul',
		'keterangan',
		'foto'
	];

	public function tweb_rtm()
	{
		return $this->belongsTo(TwebRtm::class, 'id_rtm');
	}

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function dtks_ref_lampirans()
	{
		return $this->hasMany(DtksRefLampiran::class, 'id_lampiran');
	}
}
