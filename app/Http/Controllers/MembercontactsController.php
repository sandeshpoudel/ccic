<?php

namespace App\Http\Controllers;

use App\Http\Requests\MembercontactRequest;
use App\Member;
use App\Membercontact;
use Illuminate\Http\Request;

class MembercontactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('membercontacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MembercontactRequest $membercontactRequest
     * @param Membercontact $membercontact
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(MembercontactRequest $membercontactRequest, Membercontact $membercontact)
    {
        //
        $membercontact->create($membercontactRequest->all());
        flash('New contact for member created', 'success')->important();
//        return redirect('staff/members');
        return redirect('staff/members/'.$membercontactRequest->member_id.'/edit');

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
     * @param Membercontact $membercontact
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Membercontact $membercontact)
    {
        //

        return view('membercontacts.edit', compact('membercontact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MembercontactRequest $membercontactRequest
     * @return array|\Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function update(MembercontactRequest $membercontactRequest, Membercontact $membercontact)
    {
        //
        $membercontact->update($membercontactRequest->all());
        flash('Contact details for member Updated', 'success')->important();
//        return redirect('staff/members');
        return redirect('staff/members/'.$membercontactRequest->member_id.'/edit');
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
