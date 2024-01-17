<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TwebDesaPamong
 * 
 * @property int $pamong_id
 * @property int|null $config_id
 * @property string|null $pamong_nama
 * @property string|null $gelar_depan
 * @property string|null $gelar_belakang
 * @property string|null $pamong_nip
 * @property string|null $pamong_tag_id_card
 * @property string|null $pamong_pin
 * @property string|null $pamong_nik
 * @property bool|null $pamong_status
 * @property Carbon|null $pamong_tgl_terdaftar
 * @property bool|null $pamong_ttd
 * @property string|null $foto
 * @property int|null $id_pend
 * @property string|null $pamong_tempatlahir
 * @property Carbon|null $pamong_tanggallahir
 * @property int|null $pamong_sex
 * @property int|null $pamong_pendidikan
 * @property int|null $pamong_agama
 * @property string|null $pamong_nosk
 * @property Carbon|null $pamong_tglsk
 * @property string|null $pamong_masajab
 * @property int|null $urut
 * @property string|null $pamong_niap
 * @property string|null $pamong_pangkat
 * @property string|null $pamong_nohenti
 * @property Carbon|null $pamong_tglhenti
 * @property bool $pamong_ub
 * @property int|null $atasan
 * @property int|null $bagan_tingkat
 * @property int|null $bagan_offset
 * @property string|null $bagan_layout
 * @property string|null $bagan_warna
 * @property int $kehadiran
 * @property int $jabatan_id
 * 
 * @property Config|null $config
 * @property Collection|DisposisiSuratMasuk[] $disposisi_surat_masuks
 *
 * @package App\Models
 */
class TwebDesaPamong extends Model
{
	protected $table = 'tweb_desa_pamong';
	protected $primaryKey = 'pamong_id';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'config_id' => 'int',
		'pamong_status' => 'bool',
		'pamong_tgl_terdaftar' => 'datetime',
		'pamong_ttd' => 'bool',
		'id_pend' => 'int',
		'pamong_tanggallahir' => 'datetime',
		'pamong_sex' => 'int',
		'pamong_pendidikan' => 'int',
		'pamong_agama' => 'int',
		'pamong_tglsk' => 'datetime',
		'urut' => 'int',
		'pamong_tglhenti' => 'datetime',
		'pamong_ub' => 'bool',
		'atasan' => 'int',
		'bagan_tingkat' => 'int',
		'bagan_offset' => 'int',
		'kehadiran' => 'int',
		'jabatan_id' => 'int'
	];

	protected $fillable = [
		'config_id',
		'pamong_nama',
		'gelar_depan',
		'gelar_belakang',
		'pamong_nip',
		'pamong_tag_id_card',
		'pamong_pin',
		'pamong_nik',
		'pamong_status',
		'pamong_tgl_terdaftar',
		'pamong_ttd',
		'foto',
		'id_pend',
		'pamong_tempatlahir',
		'pamong_tanggallahir',
		'pamong_sex',
		'pamong_pendidikan',
		'pamong_agama',
		'pamong_nosk',
		'pamong_tglsk',
		'pamong_masajab',
		'urut',
		'pamong_niap',
		'pamong_pangkat',
		'pamong_nohenti',
		'pamong_tglhenti',
		'pamong_ub',
		'atasan',
		'bagan_tingkat',
		'bagan_offset',
		'bagan_layout',
		'bagan_warna',
		'kehadiran',
		'jabatan_id'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}

	public function disposisi_surat_masuks()
	{
		return $this->hasMany(DisposisiSuratMasuk::class, 'id_desa_pamong');
	}
}
