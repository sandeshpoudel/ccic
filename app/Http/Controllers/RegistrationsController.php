<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Registration;
use Illuminate\Http\Request;

class RegistrationsController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RegistrationRequest $registrationRequest
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(RegistrationRequest $registrationRequest, Registration $registration)
    {
        //
        $registration->create($registrationRequest->all());
        flash('New Registration Record Created', 'success')->important();
//        return redirect('staff/members');
        return redirect('staff/members/'.$registrationRequest->member_id.'/edit');

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
    public function edit(Registration $registration)
    {
        //
//        return $registration;

        return view('registrations.edit', compact('registration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Registration $registration, RegistrationRequest $registrationRequest)
    {
        //
        $registration->update($registrationRequest->all());
        flash('Registration Record Updated', 'success')->important();
        return redirect('staff/members/'.$registrationRequest->member_id.'/edit');
//        return $registrationRequest->all();
//        return "this is the update controller";
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
