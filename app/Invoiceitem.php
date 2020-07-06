<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Invoiceitem extends Model
{
    //
    //Activity logger
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Invoice Item';


    protected $fillable = [
        'invoce_id',
        'invoiceable_id',
        'fiscal_id',
        'itemdue',
        'description',
        'amount',
        'member_id'
    ];
//'invoce_id' => 'required',
//'invoiceable_id' => 'required',
//'fiscal_id' => 'required',
//'itemdue' => 'required',
//'description' => 'required',
//'amount ' => 'required',

    public function invoice()
    {
       return $this->belongsTo('App\Invoice');
    }

    public function invoiceable()
    {
        return $this->belongsTo('App\Invoiceable');
    }

    public function fiscal()
    {
        return $this->belongsTo('App\Fiscal');
    }
    public function member()
    {
        return $this->belongsTo('App\Member');
    }

}
