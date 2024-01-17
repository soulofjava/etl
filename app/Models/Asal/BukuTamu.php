<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BukuTamu
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama
 * @property string $telepon
 * @property string $instansi
 * @property bool $jenis_kelamin
 * @property string|null $alamat
 * @property string|null $bidang
 * @property string|null $keperluan
 * @property string|null $foto
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class BukuTamu extends Model
{
	protected $table = 'buku_tamu';

	protected $casts = [
		'config_id' => 'int',
		'jenis_kelamin' => 'bool'
	];

	protected $fillable = [
		'config_id',
		'nama',
		'telepon',
		'instansi',
		'jenis_kelamin',
		'alamat',
		'bidang',
		'keperluan',
		'foto'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
