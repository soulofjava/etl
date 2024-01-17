<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Anjungan
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $ip_address
 * @property string|null $keterangan
 * @property bool|null $keyboard
 * @property bool $status
 * @property string|null $status_alasan
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $mac_address
 * @property string|null $printer_ip
 * @property string|null $printer_port
 * @property string|null $id_pengunjung
 * @property int|null $tipe
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Anjungan extends Model
{
	protected $table = 'anjungan';

	protected $casts = [
		'config_id' => 'int',
		'keyboard' => 'bool',
		'status' => 'bool',
		'created_by' => 'int',
		'updated_by' => 'int',
		'tipe' => 'int'
	];

	protected $fillable = [
		'config_id',
		'ip_address',
		'keterangan',
		'keyboard',
		'status',
		'status_alasan',
		'created_by',
		'updated_by',
		'mac_address',
		'printer_ip',
		'printer_port',
		'id_pengunjung',
		'tipe'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
