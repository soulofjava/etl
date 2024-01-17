<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MasterInventari
 * 
 * @property string $asset
 * @property int|null $config_id
 * @property int $id
 * @property string $nama_barang
 * @property string $kode_barang
 * @property string $kondisi
 * @property string $keterangan
 * @property string $asal
 * @property int|null $tahun_pengadaan
 *
 * @package App\Models
 */
class MasterInventari extends Model
{
	protected $table = 'master_inventaris';
	public $incrementing = false;
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id' => 'int',
		'tahun_pengadaan' => 'int'
	];

	protected $fillable = [
		'asset',
		'config_id',
		'id',
		'nama_barang',
		'kode_barang',
		'kondisi',
		'keterangan',
		'asal',
		'tahun_pengadaan'
	];
}
