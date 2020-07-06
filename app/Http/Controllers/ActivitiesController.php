<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivitiesController extends Controller
{
    //

    public function index()
    {
        $activities = Activity::whereDate('created_at', Carbon::today())->orderBy('created_at', 'desc')->get();
//        return $activities;
        return view('activities.index', compact('activities'));
    }

    public function filter(Request $request, Activity $activity)
    {
//        return $request->all();
        $filters = $activity->newQuery();

        if (!empty($request->description)) {
            $filters->where('description', $request->description);
        }

        if (!empty($request->created_at)) {
            $filters->whereDate('created_at', $request->created_at);
        }



        $activities = $filters->orderBy('created_at', 'desc')->get();

//        return $activities;

        return view('activities.filter', compact('activities'));


    }
}
