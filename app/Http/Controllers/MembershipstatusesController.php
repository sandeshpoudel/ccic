<?php

namespace App\Http\Controllers;

use App\Http\Requests\MembershipstatusRequest;
use App\Membershipstatus;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;



class MembershipstatusesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        //

        $membershipstatuses = Membershipstatus::latest()->withCount('member')->orderBy('id', 'desc')->paginate(50);
        return view('membershipstatuses.index', compact('membershipstatuses'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('membershipstatuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MembershipstatusRequest $membershipstatusRequest
     * @param Membershipstatus $membershipstatus
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(MembershipstatusRequest $membershipstatusRequest, Membershipstatus $membershipstatus)
    {
        //
        $membershipstatus->create($membershipstatusRequest->all());
        flash('New Membershipstatus Created', 'success')->important();
        return  redirect('staff/membershipstatuses');
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
     * @param Membershipstatus $membershipstatus
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Membershipstatus $membershipstatus)
    {
        //
        return view('membershipstatuses.edit',compact('membershipstatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MembershipstatusRequest $membershipstatusRequest
     * @param Membershipstatus $membershipstatus
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function update(MembershipstatusRequest $membershipstatusRequest, Membershipstatus $membershipstatus)
    {
        //
        $membershipstatus->update($membershipstatusRequest->all());
        flash('Membership Status detail updated', 'Success')->important();
        return redirect('staff/membershipstatuses');
    }

    /**
     * @param Membershipstatus $membershipstatus
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function members(Membershipstatus $membershipstatus)
    {
        $members =$membershipstatus->member()
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
