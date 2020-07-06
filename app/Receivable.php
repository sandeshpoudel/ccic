<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Receivable extends Model
{
    //
    //Activity logger
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Receivable';

    protected $fillable = [
        'member_id',
        'heading',
        'amount',
        'issuedate',
        'receiveddate',
        'status'
    ];

    public function member()
    {
        return $this->belongsTo('App\Member');
    }
}
