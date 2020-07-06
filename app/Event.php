<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class Event extends Model
{
//    protected $dates = ['start','end'];

    //Activity logger
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Event';
    protected $fillable =[
        'title',
        'fiscal_id',
        'description',
        'start',
        'end',
        'nepali'
    ];

    public function fiscal()
    {
        return $this->belongsTo('App\Fiscal');
    }

    public function representative()
    {
        return $this->hasMany('App\Representative');
    }
}
