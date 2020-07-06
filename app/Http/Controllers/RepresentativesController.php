<?php

namespace App\Http\Controllers;

use App\Event;
use App\Fiscal;

use App\Http\Requests\RepresentativeRequest;
use App\Member;
use App\Registration;
use App\Representative;
use Illuminate\Http\Request;

class RepresentativesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Member $member)
    {
        //
        $currentfiscal = Fiscal::where('status', 1)->first();
        $events = Event::where('fiscal_id',$currentfiscal->id)->pluck('title','id');
        return view('representatives.create', compact('member', 'events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Member $member
     * @param RepresentativeRequest $representativeRequest
     * @return Member
     */
    public function store(RepresentativeRequest $representativeRequest, Representative $representative)
    {
        //
//        return $representativeRequest->all();
        $representative->create($representativeRequest->all());
        flash('New Representative for member created', 'success')->important();
        return redirect('staff/members/'.$representativeRequest->member_id.'/edit');

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Representative $representative)
    {
        //
        $currentfiscal = Fiscal::where('status', 1)->first();
        $events = Event::where('fiscal_id',$currentfiscal->id)->pluck('title','id');
        return view('representatives.edit', compact('representative', 'events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Representative $representative, RepresentativeRequest $representativeRequest)
    {
        //
//        return $representativeRequest->all();
        $representative->update($representativeRequest->all());
        flash('Representative details updated for member', 'success')->important();
        return redirect('staff/members/'.$representativeRequest->member_id.'/edit');

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
