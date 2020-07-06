<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Invoice extends Model
{
    //
    //Activity logger
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Invoice';


    protected $fillable = [
        'member_id',
        'type',
        'date',
        'duedate',
        'total',
        'paidamount',
        'fine',
        'discount',
        'status',
        'remarks',
        'method',
        'reference',
        'paymentby'

    ];
//    protected $dates = ['date','duedate'];

    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    public function invoiceitem()
    {
        return $this->hasMany('App\Invoiceitem');
    }

    /**
     * @param array $dates
     * @return Invoice
     */
    public function setDates($dates)
    {
        $this->dates=$dates;
        return $this;
    }
}
