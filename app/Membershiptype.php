<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Membershiptype extends Model
{
    //
    //Activity logger
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Membership Type';
    protected $fillable = [
        'title',
        'description',
        'status',
        'nepali'
    ];

    public function member()
    {
        return $this->hasMany('App\Member');
    }

    public function fee()
    {
        return $this->hasMany('App\Fee');
    }
}
