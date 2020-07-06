<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use NodeTrait;
    //Activity logger
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Category';


    //
    protected $fillable = ['title', 'description', 'parent_id', 'nepali'];

    public function member()
    {
        return $this->hasMany('App\Member');
    }
}
