<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Invoiceable extends Model
{
    //
    //Activity logger
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Invoiceable';

    protected $fillable = [ 'title', 'description', 'nepali', 'status'];



    public function invoiceitem()
    {
        return $this->hasMany('App\Invoiceitem');
    }


}
