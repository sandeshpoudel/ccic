<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class Membershipstatus extends Model
{

    //Activity logger
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Membership Status';

    protected $fillable = [
        'title',
        'description',
        'colour',
        'nepali'
    ];

    public function member()
    {
        return $this->hasMany('App\Member');
    }
}
