<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KeuanganManualRefBidang
 * 
 * @property int $id
 * @property string $Kd_Bid
 * @property string $Nama_Bidang
 *
 * @package App\Models
 */
class KeuanganManualRefBidang extends Model
{
	protected $table = 'keuangan_manual_ref_bidang';
	public $timestamps = false;
	protected $connection = "asal";

	protected $fillable = [
		'Kd_Bid',
		'Nama_Bidang'
	];
}
