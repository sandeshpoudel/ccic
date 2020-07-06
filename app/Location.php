<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class Location extends Model
{
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Location';

    protected $fillable = [
        'title',
        'type',
        'description',
        'nepali'

    ];

    public function member()
    {
        return $this->hasMany('App\Member');
    }
}
