<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sentitem
 * 
 * @property Carbon $UpdatedInDB
 * @property Carbon $InsertIntoDB
 * @property Carbon $SendingDateTime
 * @property Carbon|null $DeliveryDateTime
 * @property string $Text
 * @property string $DestinationNumber
 * @property string $Coding
 * @property string $UDH
 * @property string $SMSCNumber
 * @property int $Class
 * @property string $TextDecoded
 * @property int $ID
 * @property int|null $config_id
 * @property string $SenderID
 * @property int $SequencePosition
 * @property string $Status
 * @property int $StatusError
 * @property int $TPMR
 * @property int $RelativeValidity
 * @property string $CreatorID
 * 
 * @property Config|null $config
 *
 * @package App\Models
 */
class Sentitem extends Model
{
	protected $table = 'sentitems';
	public $incrementing = false;
	public $timestamps = false;
	protected $connection = "tujuan";

	protected $casts = [
		'UpdatedInDB' => 'datetime',
		'InsertIntoDB' => 'datetime',
		'SendingDateTime' => 'datetime',
		'DeliveryDateTime' => 'datetime',
		'Class' => 'int',
		'ID' => 'int',
		'config_id' => 'int',
		'SequencePosition' => 'int',
		'StatusError' => 'int',
		'TPMR' => 'int',
		'RelativeValidity' => 'int'
	];

	protected $fillable = [
		'UpdatedInDB',
		'InsertIntoDB',
		'SendingDateTime',
		'DeliveryDateTime',
		'Text',
		'DestinationNumber',
		'Coding',
		'UDH',
		'SMSCNumber',
		'Class',
		'TextDecoded',
		'config_id',
		'SenderID',
		'Status',
		'StatusError',
		'TPMR',
		'RelativeValidity',
		'CreatorID'
	];

	public function config()
	{
		return $this->belongsTo(Config::class);
	}
}
