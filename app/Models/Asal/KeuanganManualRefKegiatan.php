<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganManualRefKegiatan
 * 
 * @property int $id
 * @property string $ID_Keg
 * @property string $Nama_Kegiatan
 *
 * @package App\Models
 */
class KeuanganManualRefKegiatan extends Model
{
	protected $table = 'keuangan_manual_ref_kegiatan';
	public $timestamps = false;
	protected $connection = "asal";

	protected $fillable = [
		'ID_Keg',
		'Nama_Kegiatan'
	];
}
