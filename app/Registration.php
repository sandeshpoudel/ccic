<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class Registration extends Model
{
    //Activity logger
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Registration';

    protected $fillable = [
        'member_id',
        'authority',
        'number',
        'date'

    ];

    public function member()
    {
        return $this->belongsTo('App\Member');
    }
}
