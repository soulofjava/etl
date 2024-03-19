<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Url
 *
 * @property int $id
 * @property int|null $config_id
 * @property string $url
 * @property string $alias
 * @property Carbon $created
 *
 * @property Config|null $config
 *
 * @package App\Models
 */
class Url extends Model
{
    protected $table = 'urls';
    public $timestamps = false;
    protected $connection = "tujuan";

    protected $casts = [
        'config_id' => 'int',
        'created' => 'datetime'
    ];

    protected $fillable = [
        'config_id',
        'url',
        'alias',
        'created'
    ];

    public function config()
    {
        return $this->belongsTo(Config::class);
    }

    public function log_surat()
    {
        return $this->hasOne(LogSurat::class, 'urls_id');
    }
}
