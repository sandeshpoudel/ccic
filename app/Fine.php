<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Fine extends Model
{
    //

    //Activity logger
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Fine';
    protected $dates = [
        'startad',
        'endad',

    ];

    protected $fillable = [
        'fiscal_id',
        'startbs',
        'startad',
        'endbs',
        'endad',
        'fine'
    ];

    public function fiscal()
    {
        return $this->belongsTo('App\Fiscal');
    }
}
