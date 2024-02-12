<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HubungWarga
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_grup
 * @property string $subjek
 * @property string $isi
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * 
 * @property Config|null $config
 * @property KontakGrup $kontak_grup
 *
 * @package App\Models
 */
class HubungWarga extends Model
{
	protected $table = 'hubung_warga';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_grup' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_grup',
		'subjek',
		'isi',
		'created_by',
		'updated_by'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function kontak_grup()
	{
		return $this->belongsTo(KontakGrup::class, 'id_grup');
	}
}
