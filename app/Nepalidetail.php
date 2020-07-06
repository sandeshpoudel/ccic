<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Nepalidetail extends Model
{
    //
    //Activity logger
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Nepali Detail';
    protected $fillable = [
        'member_id',
        'name',
        'propritorsname',
        'fulladdress'
    ];

    public function member()
    {
        return $this->belongsTo('App\Member');
    }
}
