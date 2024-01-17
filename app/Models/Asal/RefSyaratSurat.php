<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefSyaratSurat
 * 
 * @property int $ref_syarat_id
 * @property int|null $config_id
 * @property string $ref_syarat_nama
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class RefSyaratSurat extends Model
{
	protected $table = 'ref_syarat_surat';
	protected $primaryKey = 'ref_syarat_id';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int'
	];

	protected $fillable = [
		'config_id',
		'ref_syarat_nama'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
