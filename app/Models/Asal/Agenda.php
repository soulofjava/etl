<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Agenda
 * 
 * @property int $id
 * @property int|null $config_id
 * @property int $id_artikel
 * @property Carbon $tgl_agenda
 * @property string $koordinator_kegiatan
 * @property string $lokasi_kegiatan
 * 
 * @property Config|null $config
 * @property Artikel $artikel
 *
 * @package App\Models
 */
class Agenda extends Model
{
	protected $table = 'agenda';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'id_artikel' => 'int',
		'tgl_agenda' => 'datetime'
	];

	protected $fillable = [
		'config_id',
		'id_artikel',
		'tgl_agenda',
		'koordinator_kegiatan',
		'lokasi_kegiatan'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function artikel()
	{
		return $this->belongsTo(Artikel::class, 'id_artikel');
	}
}
