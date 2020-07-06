<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Ownershiptype extends Model
{
    //
    //Activity logger
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Ownership Type';
    protected $fillable = ['name', 'nepali'];

    public function member()
    {
        return $this->hasMany('App\Member');
    }
    
}
