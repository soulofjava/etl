<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Produk
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int|null $id_pelapak
 * @property int|null $id_produk_kategori
 * @property string|null $nama
 * @property int|null $harga
 * @property string|null $satuan
 * @property bool|null $tipe_potongan
 * @property int|null $potongan
 * @property string|null $deskripsi
 * @property string|null $foto
 * @property bool $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Pelapak|null $pelapak
 * @property Config|null $config
 * @property ProdukKategori|null $produk_kategori
 *
 * @package App\Models
 */
class Produk extends Model
{
	protected $table = 'produk';
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_pelapak' => 'int',
		'id_produk_kategori' => 'int',
		'harga' => 'int',
		'tipe_potongan' => 'bool',
		'potongan' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'config_id',
		'id_pelapak',
		'id_produk_kategori',
		'nama',
		'harga',
		'satuan',
		'tipe_potongan',
		'potongan',
		'deskripsi',
		'foto',
		'status'
	];

	public function pelapak()
	{
		return $this->belongsTo(Pelapak::class, 'id_pelapak');
	}

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function produk_kategori()
	{
		return $this->belongsTo(ProdukKategori::class, 'id_produk_kategori');
	}
}
