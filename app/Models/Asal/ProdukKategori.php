<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProdukKategori
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string|null $kategori
 * @property string|null $slug
 * @property bool $status
 * 
 * @property Config|null $config
 * @property Collection|Produk[] $produks
 *
 * @package App\Models
 */
class ProdukKategori extends Model
{
	protected $table = 'produk_kategori';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'config_id',
		'kategori',
		'slug',
		'status'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function produks()
	{
		return $this->hasMany(Produk::class, 'id_produk_kategori');
	}
}
