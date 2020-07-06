<?php

namespace App\Http\Controllers;

use App\Http\Requests\MembershiptypeReuest;
use App\Membershiptype;
use Illuminate\Http\Request;

class MembershiptypesController extends Controller
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
        //
        $membershiptypes = Membershiptype::latest()->withCount('member')->orderBy('id', 'desc')->paginate(50);

        return view('membershiptypes.index', compact('membershiptypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('membershiptypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MembershiptypeReuest $membershiptypeReuest
     * @param Membershiptype $membershiptype
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(MembershiptypeReuest $membershiptypeReuest, Membershiptype $membershiptype)
    {
        //
        $membershiptype->create($membershiptypeReuest->all());
        flash('New membership type created', 'success')->important();
       return redirect('staff/membershiptypes');

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
     * @param Membershiptype $membershiptype
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Membershiptype $membershiptype)
    {
        //
        return view('membershiptypes.edit', compact('membershiptype'));
    }


    /**
     * @param MembershiptypeReuest $membershiptypeReuest
     * @param Membershiptype $membershiptype
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(MembershiptypeReuest $membershiptypeReuest, Membershiptype $membershiptype)
    {
        //
//        return $membershiptypeReuest->all();
        $membershiptype->update($membershiptypeReuest->all());
        flash('Membership Type successfully updated', 'success')->important();
        return redirect('staff/membershiptypes');
    }

    /**
     * @param Membershiptype $membershiptype
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function members(Membershiptype $membershiptype)
    {
        $members =$membershiptype->member()
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
