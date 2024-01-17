<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SuplemenTerdatum
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int|null $id_suplemen
 * @property string|null $id_terdata
 * @property int|null $sasaran
 * @property string|null $keterangan
 * 
 * @property Config|null $config
 * @property Supleman|null $supleman
 *
 * @package App\Models
 */
class SuplemenTerdatum extends Model
{
	protected $table = 'suplemen_terdata';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'id_suplemen' => 'int',
		'sasaran' => 'int'
	];

	protected $fillable = [
		'config_id',
		'id_suplemen',
		'id_terdata',
		'sasaran',
		'keterangan'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function supleman()
	{
		return $this->belongsTo(Supleman::class, 'id_suplemen');
	}
}
