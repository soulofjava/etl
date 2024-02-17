<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SasaranPaud
 * 
 * @property int $id_sasaran_paud
 * @property int|null $config_id
 * @property int $posyandu_id
 * @property int $kia_id
 * @property bool $kategori_usia
 * @property bool $januari
 * @property bool $februari
 * @property bool $maret
 * @property bool $april
 * @property bool $mei
 * @property bool $juni
 * @property bool $juli
 * @property bool $agustus
 * @property bool $september
 * @property bool $oktober
 * @property bool $november
 * @property bool $desember
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class SasaranPaud extends Model
{
	protected $table = 'sasaran_paud';
	protected $primaryKey = 'id_sasaran_paud';
	protected $connection = "asal";


	protected $casts = [
		'config_id' => 'int',
		'posyandu_id' => 'int',
		'kia_id' => 'int',
		'kategori_usia' => 'bool',
		'januari' => 'bool',
		'februari' => 'bool',
		'maret' => 'bool',
		'april' => 'bool',
		'mei' => 'bool',
		'juni' => 'bool',
		'juli' => 'bool',
		'agustus' => 'bool',
		'september' => 'bool',
		'oktober' => 'bool',
		'november' => 'bool',
		'desember' => 'bool',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'config_id',
		'posyandu_id',
		'kia_id',
		'kategori_usia',
		'januari',
		'februari',
		'maret',
		'april',
		'mei',
		'juni',
		'juli',
		'agustus',
		'september',
		'oktober',
		'november',
		'desember',
		'created_by',
		'updated_by'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
