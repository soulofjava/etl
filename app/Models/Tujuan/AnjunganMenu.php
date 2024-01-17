<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AnjunganMenu
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $nama
 * @property string|null $icon
 * @property string $link
 * @property int $link_tipe
 * @property int $urut
 * @property int $status
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class AnjunganMenu extends Model
{
	protected $table = 'anjungan_menu';

	protected $casts = [
		'config_id' => 'int',
		'link_tipe' => 'int',
		'urut' => 'int',
		'status' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'config_id',
		'nama',
		'icon',
		'link',
		'link_tipe',
		'urut',
		'status',
		'created_by',
		'updated_by'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
