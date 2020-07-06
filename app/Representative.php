<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Representative extends Model
{
    //
    //Activity logger
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Representative';
    protected $fillable = [
        'member_id',
        'event_id',
        'name',
        'nepali',
        'phone',
        'relation',
        'description'


    ];

    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
