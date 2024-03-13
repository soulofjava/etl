<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Kium
 *
 * @property int $id
 * @property int|null $config_id
 * @property string $no_kia
 * @property int $ibu_id
 * @property int|null $anak_id
 * @property Carbon|null $hari_perkiraan_lahir
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 *
 * @property Config|null $config
 *
 * @package App\Models
 */
class Kium extends Model
{
    protected $table = 'kia';
    protected $connection = "asal";

    protected $casts = [
        'config_id' => 'int',
        'ibu_id' => 'int',
        'anak_id' => 'int',
        'hari_perkiraan_lahir' => 'datetime',
        'created_by' => 'int',
        'updated_by' => 'int'
    ];

    protected $fillable = [
        'config_id',
        'no_kia',
        'ibu_id',
        'anak_id',
        'hari_perkiraan_lahir',
        'created_by',
        'updated_by'
    ];

    public function config()
    {
        return $this->belongsTo(Config::class);
    }
}
