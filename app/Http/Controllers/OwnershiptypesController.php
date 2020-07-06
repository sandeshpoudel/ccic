<?php

namespace App\Http\Controllers;

use App\Http\Requests\OwnershiptypeRequest;
use App\Ownershiptype;
use Illuminate\Http\Request;

class OwnershiptypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ownershiptypes = Ownershiptype::latest()
            ->withCount('member')
            ->orderBy('id', 'desc')
            ->paginate(50);
        return view('owners.index', compact('ownershiptypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('owners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Ownershiptype $ownershiptype
     * @param OwnershiptypeRequest $ownershiptypeRequest
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(Ownershiptype $ownershiptype, OwnershiptypeRequest $ownershiptypeRequest)
    {
        //
        $ownershiptype->create($ownershiptypeRequest->all());
        flash('New Ownership Types Created', 'success')->important();
        return redirect('staff/ownershiptypes');
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
     * @param Ownershiptype $ownershiptype
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Ownershiptype $ownershiptype)
    {
        //
        return view('owners.edit', compact('ownershiptype'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Ownershiptype $ownershiptype
     * @param OwnershiptypeRequest $ownershiptypeRequest
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function update(Ownershiptype $ownershiptype, OwnershiptypeRequest $ownershiptypeRequest)
    {
        //
        $ownershiptype->update($ownershiptypeRequest->all());
        flash('Ownership Types Updated', 'success')->important();
        return redirect('staff/ownershiptypes');
    }

    public function members(Ownershiptype $ownershiptype)
    {
        $members =$ownershiptype->member()
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
