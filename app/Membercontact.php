<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Membercontact extends Model
{
    //
    //Activity logger
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Member Contact';

    protected $fillable = [
        'member_id',
        'name',
        'position',
        'phone',
        'email'
    ];

    public function member()
    {
        return $this->belongsTo('App\Member');
    }
}
