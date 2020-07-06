<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Fee extends Model
{
    //

    //Activity logger
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Fee';
    protected $fillable = [ 'fiscal_id', 'membershiptype_id', 'capitalfrom', 'capitalto','entry','annual','renew'];


    public function fiscal()
    {
        return $this->belongsTo('App\Fiscal');
    }

    public function membershiptype()
    {
        return $this->belongsTo('App\Membershiptype');
    }
}
