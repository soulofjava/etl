<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class Program
 *
 * @property int $id
 * @property int|null $config_id
 * @property string $nama
 * @property int|null $sasaran
 * @property string|null $ndesc
 * @property Carbon $sdate
 * @property Carbon $edate
 * @property int $userid
 * @property bool $status
 * @property string|null $asaldana
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 *
 * @property Config|null $config
 * @property Collection|DtksPengaturanProgram[] $dtks_pengaturan_programs
 *
 * @package App\Models
 */
class Program extends Model
{
    protected $table = 'program';
    protected $connection = "tujuan";

    protected $casts = [
        'config_id' => 'int',
        'sasaran' => 'int',
        'sdate' => 'datetime',
        'edate' => 'datetime',
        'userid' => 'int',
        'status' => 'bool',
        'created_by' => 'int',
        'updated_by' => 'int'
    ];

    protected $fillable = [
        'config_id',
        'slug',
        'nama',
        'sasaran',
        'ndesc',
        'sdate',
        'edate',
        'userid',
        'status',
        'asaldana',
        'created_by',
        'updated_by'
    ];

    public function config()
    {
        return $this->belongsTo(Config::class);
    }

    public function dtks_pengaturan_programs()
    {
        return $this->hasMany(DtksPengaturanProgram::class, 'id_bantuan');
    }

    public function generateSlug()
    {
        $baseSlug = Str::slug($this->nama);
        $slug = $baseSlug;
        $count = 1;

        while ($this->slugExists($slug, $this->id)) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        $this->slug = $slug;
    }

    private function slugExists($slug, $currentId = null)
    {
        $query = static::where('slug', $slug);

        if ($currentId !== null) {
            $query->where('id', '!=', $currentId);
        }

        return $query->exists();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->generateSlug();
        });
    }
}
