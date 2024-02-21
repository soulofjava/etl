<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class Kategori
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string $kategori
 * @property int $tipe
 * @property int $urut
 * @property int $enabled
 * @property int $parrent
 * @property string|null $slug
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Kategori extends Model
{
	protected $table = 'kategori';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'tipe' => 'int',
		'urut' => 'int',
		'enabled' => 'int',
		'parrent' => 'int'
	];

	protected $fillable = [
		'config_id',
		'kategori',
		'tipe',
		'urut',
		'enabled',
		'parrent',
		'slug'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function generateSlug()
	{
		$baseSlug = Str::slug($this->kategori);
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
