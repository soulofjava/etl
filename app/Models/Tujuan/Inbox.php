<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Inbox
 * 
 * @property Carbon $UpdatedInDB
 * @property Carbon $ReceivingDateTime
 * @property string $Text
 * @property string $SenderNumber
 * @property string $Coding
 * @property string $UDH
 * @property string $SMSCNumber
 * @property int $Class
 * @property string $TextDecoded
 * @property int $ID
 * @property int|null $config_id
 * @property string $RecipientID
 * @property string $Processed
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Inbox extends Model
{
	protected $table = 'inbox';
	protected $primaryKey = 'ID';
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'UpdatedInDB' => 'datetime',
		'ReceivingDateTime' => 'datetime',
		'Class' => 'int',
		'config_id' => 'int'
	];

	protected $fillable = [
		'UpdatedInDB',
		'ReceivingDateTime',
		'Text',
		'SenderNumber',
		'Coding',
		'UDH',
		'SMSCNumber',
		'Class',
		'TextDecoded',
		'config_id',
		'RecipientID',
		'Processed'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
