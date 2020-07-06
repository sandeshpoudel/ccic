<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Location;

use App\Member;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $locations = Location::latest()->withCount('member')->orderBy('id', 'desc')->paginate(50);
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LocationRequest $locationRequest
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(LocationRequest $locationRequest, Location $location)
    {
        //
        $location->create($locationRequest->all());
        flash('New Location Created', 'success')->important();
        return redirect('staff/locations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Location $location
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Location $location)
    {
        //
        return view('locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LocationRequest $locationRequest
     * @param Location $location
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function update(LocationRequest $locationRequest, Location $location)
    {
        //
        $location->update($locationRequest->all());
        flash('Location Details Updated', 'success')->important();
        return redirect('staff/locations');
    }

    /**
     * Create list of municipalities only
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function municipalities()
    {
        $locations = Location::where('type','Municipality')->orderBy('id', 'desc')->paginate(50);
        return view('locations.index', compact('locations'));
    }

    public function metro()
    {
        $locations = Location::where('type','Metropolitan City')->orderBy('id', 'desc')->paginate(50);
        return view('locations.index', compact('locations'));
    }

    /**
     * create list of vdcs only
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function vdcs()
    {
        $locations = Location::where('type','VDC')->orderBy('id', 'desc')->paginate(50);
        return view('locations.index', compact('locations'));
    }


    /**
     * @param Location $location
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function members(Location $location)
    {
        $members =$location->member()
            ->whereIn('membershipstatus_id', [4,5,2])
            ->orderBy('id', 'desc')
            ->paginate(50);
        return view('members.index', compact('members'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
