<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefSinkronisasi
 * 
 * @property string $tabel
 * @property string|null $server
 * @property int|null $jenis_update
 * @property string|null $tabel_hapus
 *
 * @package App\Models
 */
class RefSinkronisasi extends Model
{
	protected $table = 'ref_sinkronisasi';
	protected $primaryKey = 'tabel';
	public $incrementing = false;
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'jenis_update' => 'int'
	];

	protected $fillable = [
		'server',
		'jenis_update',
		'tabel_hapus'
	];
}
