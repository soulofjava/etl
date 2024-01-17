<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefPendudukBidang
 * 
 * @property int $id
 * @property string $nama
 *
 * @package App\Models
 */
class RefPendudukBidang extends Model
{
	protected $table = 'ref_penduduk_bidang';
	public $timestamps = false;
	protected $connection = "asal";

	protected $fillable = [
		'nama'
	];
}
