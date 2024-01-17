<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Komentar
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_artikel
 * @property string $owner
 * @property string|null $email
 * @property string|null $subjek
 * @property string $komentar
 * @property Carbon $tgl_upload
 * @property bool|null $status
 * @property bool|null $tipe
 * @property string|null $no_hp
 * @property Carbon $updated_at
 * @property bool|null $is_archived
 * @property string|null $permohonan
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Komentar extends Model
{
	protected $table = 'komentar';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_artikel' => 'int',
		'tgl_upload' => 'datetime',
		'status' => 'bool',
		'tipe' => 'bool',
		'is_archived' => 'bool'
	];

	protected $fillable = [
		'config_id',
		'id_artikel',
		'owner',
		'email',
		'subjek',
		'komentar',
		'tgl_upload',
		'status',
		'tipe',
		'no_hp',
		'is_archived',
		'permohonan'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
