<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CaptchaCode
 * 
 * @property string $id
 * @property string $namespace
 * @property string $code
 * @property string $code_display
 * @property int $created
 * @property string|null $audio_data
 *
 * @package App\Models
 */
class CaptchaCode extends Model
{
	protected $table = 'captcha_codes';
	public $incrementing = false;
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'created' => 'int'
	];

	protected $fillable = [
		'code',
		'code_display',
		'created',
		'audio_data'
	];
}
