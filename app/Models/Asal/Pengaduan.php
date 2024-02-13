<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pengaduan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int|null $id_pengaduan
 * @property string|null $nik
 * @property string $nama
 * @property string|null $email
 * @property string|null $telepon
 * @property string|null $judul
 * @property string $isi
 * @property int $status
 * @property string|null $foto
 * @property string $ip_address
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Pengaduan extends Model
{
	protected $table = 'pengaduan';
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_pengaduan' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_pengaduan',
		'nik',
		'nama',
		'email',
		'telepon',
		'judul',
		'isi',
		'status',
		'foto',
		'ip_address'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
