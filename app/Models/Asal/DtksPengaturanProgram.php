<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DtksPengaturanProgram
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $versi_kuisioner
 * @property string $kode
 * @property int|null $id_bantuan
 * @property string|null $nilai_default
 * @property string $target_table
 * @property string $target_field
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Program|null $program
 * @property Config|null $config
 *
 * @package App\Models
 */
class DtksPengaturanProgram extends Model
{
	protected $table = 'dtks_pengaturan_program';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'versi_kuisioner' => 'int',
		'id_bantuan' => 'int'
	];

	protected $fillable = [
		'config_id',
		'versi_kuisioner',
		'kode',
		'id_bantuan',
		'nilai_default',
		'target_table',
		'target_field'
	];

	public function program()
	{
		return $this->belongsTo(Program::class, 'id_bantuan');
	}

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
