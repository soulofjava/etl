<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RefPindah
 * 
 * @property int $id
 * @property string $nama
 * 
 * @property Collection|LogPenduduk[] $log_penduduks
 *
 * @package App\Models
 */
class RefPindah extends Model
{
	protected $table = 'ref_pindah';
	public $incrementing = false;
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'nama'
	];

	public function log_penduduks()
	{
		return $this->hasMany(LogPenduduk::class, 'ref_pindah');
	}
}
