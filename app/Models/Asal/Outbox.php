<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Asal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Outbox
 * 
 * @property Carbon $UpdatedInDB
 * @property Carbon $InsertIntoDB
 * @property Carbon $SendingDateTime
 * @property Carbon $SendBefore
 * @property Carbon $SendAfter
 * @property string|null $Text
 * @property string $DestinationNumber
 * @property string $Coding
 * @property string|null $UDH
 * @property int|null $Class
 * @property string $TextDecoded
 * @property int $ID
 * @property int|null $config_id
 * @property string|null $MultiPart
 * @property int|null $RelativeValidity
 * @property string|null $SenderID
 * @property Carbon|null $SendingTimeOut
 * @property string|null $DeliveryReport
 * @property string|null $CreatorID
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Outbox extends Model
{
	protected $table = 'outbox';
	protected $primaryKey = 'ID';
	public $timestamps = false;
	protected $connection = "asal";

	protected $casts = [
		'UpdatedInDB' => 'datetime',
		'InsertIntoDB' => 'datetime',
		'SendingDateTime' => 'datetime',
		'SendBefore' => 'datetime',
		'SendAfter' => 'datetime',
		'Class' => 'int',
		'config_id' => 'int',
		'RelativeValidity' => 'int',
		'SendingTimeOut' => 'datetime'
	];

	protected $fillable = [
		'UpdatedInDB',
		'InsertIntoDB',
		'SendingDateTime',
		'SendBefore',
		'SendAfter',
		'Text',
		'DestinationNumber',
		'Coding',
		'UDH',
		'Class',
		'TextDecoded',
		'config_id',
		'MultiPart',
		'RelativeValidity',
		'SenderID',
		'SendingTimeOut',
		'DeliveryReport',
		'CreatorID'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
