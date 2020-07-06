<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Member extends Model
{
    //Activity logger
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Member';
    //
//    protected $dates = ['startDate','applicationDate', 'nepalistartdate'];
    protected $fillable = [
        'name',
        'details',
        'category_id',
        'capital',
        'nature',
        'membershiptype_id',
        'startDate',
        'nepalistartdate',
        'location_id',
        'ward',
        'chowk',
        'tole',
        'phone',
        'website',
        'email',
        'fax',
        'proprietorName',
        'proprietorPhone',
        'proprietorMobile',
        'gender',
        'nationality',
        'citizenship',
        'landlord',
        'charkilla',
        'applicantName',
        'applicationRelation',
        'membershipstatus_id',
        'applicationDate',
        'ownershiptype_id',
        'applicationDateInBS',
        'applicationDateInAD',
        'applicationApprovalDateInBS',
        'applicationApprovalDateInAD',
        'renewalfailedsince'
        ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function membershipstatus()
    {
        return $this->belongsTo('App\Membershipstatus');
    }

    public function membershiptype()
    {
        return $this->belongsTo('App\Membershiptype');
    }

    public function ownershiptype()
    {
        return $this->belongsTo('App\Ownershiptype');
    }

    public function membercontact()
    {
        return $this->hasMany('App\Membercontact');
    }

    public function representative()
    {
        return $this->hasMany('App\Representative');
    }

    public function invoice()
    {
        return $this->hasMany('App\Invoice');
    }

    public function invoiceitem()
    {
        return $this->hasMany('App\Invoiceitem');
    }


    public function receivable()
    {
        return $this->hasMany('App\Receivable');
    }
    public function registration()
    {
        return $this->hasMany('App\Registration');
    }
    public function nepalidetail()
    {
        return $this->hasOne('App\Nepalidetail');
    }


}
