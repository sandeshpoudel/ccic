<?php

namespace App\Http\Controllers;

use App\Http\Requests\NepalidetailRequest;
use App\Member;
use App\Nepalidetail;
use Illuminate\Http\Request;

class NepalidetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "this is index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return "this is create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Member $member, NepalidetailRequest $nepalidetailRequest)
    {
        //

//        $member->nepalidetail()->updateOrCreate($nepalidetailRequest->except('_token'));
        $member->nepalidetail()->create($nepalidetailRequest->all());
        flash('Members details in Nepali updated', 'success')->important();
        return  redirect('staff/members');
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
    public function edit($id)
    {
        //
        return "this is edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NepalidetailRequest $nepalidetailRequest, Nepalidetail $nepalidetail)
    {
        //
//        return $nepalidetail->member_id;
        $nepalidetail->update($nepalidetailRequest->all());
        flash('Members details in Nepali updated', 'success')->important();
        return redirect('staff/members/'.$nepalidetail->member_id.'/edit');

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
