<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Fiscal extends Model
{
    //Activity logger
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Fiscal Year';

    protected $fillable = [
        'title',
        'durationFromAd',
        'durationToAd',
        'durationFromBs',
        'durationToBs',
        'status'
        
    ];

    public function event()
    {
        return $this->hasMany('App\Event');
    }

    public function fine()
    {
        return $this->hasMany('App\Fine');
    }

    public function invoiceitem()
    {
        return $this->hasMany('App\Invoiceitem');
    }

    public function fee()
    {
        return $this->hasMany('App\Fee');
    }


}
