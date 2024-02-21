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
 * Class Artikel
 * 
 * @property int $id
 * @property int|null $config_id
 * @property string|null $gambar
 * @property string $isi
 * @property int $enabled
 * @property Carbon $tgl_upload
 * @property int $id_kategori
 * @property int $id_user
 * @property string $judul
 * @property int $headline
 * @property string|null $gambar1
 * @property string|null $gambar2
 * @property string|null $gambar3
 * @property string|null $dokumen
 * @property string|null $link_dokumen
 * @property bool $boleh_komentar
 * @property string|null $slug
 * @property int|null $hit
 * 
 * @property Config|null $config
 * @property Collection|Agenda[] $agendas
 *
 * @package App\Models
 */
class Artikel extends Model
{
	protected $table = 'artikel';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'config_id' => 'int',
		'enabled' => 'int',
		'tgl_upload' => 'datetime',
		'id_kategori' => 'int',
		'id_user' => 'int',
		'headline' => 'int',
		'boleh_komentar' => 'bool',
		'hit' => 'int'
	];

	protected $fillable = [
		'config_id',
		'gambar',
		'isi',
		'enabled',
		'tgl_upload',
		'id_kategori',
		'id_user',
		'judul',
		'headline',
		'gambar1',
		'gambar2',
		'gambar3',
		'dokumen',
		'link_dokumen',
		'boleh_komentar',
		'slug',
		'hit'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function agendas()
	{
		return $this->hasMany(Agenda::class, 'id_artikel');
	}



	public function users()
	{
		return $this->hasMany(User::class, 'id_user');
	}

	public function kategori()
	{
		return $this->hasMany(Kategori::class, 'id', 'id_kategori');
	}

	public function generateSlug()
	{
		$baseSlug = Str::slug($this->judul);
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
