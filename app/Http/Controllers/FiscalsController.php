<?php

namespace App\Http\Controllers;

use App\Fiscal;
use App\Http\Requests\FiscalRequest;
use App\Member;
use App\Membershiptype;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FiscalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fiscals = Fiscal::latest()->orderBy('id', 'desc')->paginate(50);
        return view('fiscals.index', compact('fiscals'));

//        $currentfiscalyear = Fiscal::where('status', '1')->first();
//        //        return Carbon::parse($currentfiscalyear->durationFromAd)->addDay(1);
//        $nextfiscalyear = Fiscal::whereDate('durationFromAd', Carbon::parse($currentfiscalyear->durationToAd)->addDay(1))->first();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('fiscals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Fiscal $fiscal
     * @param FiscalRequest $fiscalRequest
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(Fiscal $fiscal, FiscalRequest $fiscalRequest)
    {
        //
        $fiscal->create($fiscalRequest->all());
        flash('New Fiscal Year Created Successfully', 'success')->important();
        return redirect('staff/fiscals');
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
     * @param Fiscal $fiscal
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Fiscal $fiscal)
    {
        //

        return view('fiscals.edit', compact('fiscal'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Fiscal $fiscal
     * @param FiscalRequest $fiscalRequest
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function update(Fiscal $fiscal, FiscalRequest $fiscalRequest)
    {
        //
//        return $fiscalRequest->all();
        $fiscal->update($fiscalRequest->all());
        flash('Fiscal Year Details updated successfully', 'success')->important();
        return redirect('staff/fiscals');
    }

    /**
     * @param Fiscal $fiscal
     * @param Membershiptype $membershiptype
     * @return Membershiptype
     */




    public function latefee(Fiscal $fiscal)
    {
        //
        $membertypes = Membershiptype::latest()->get();
        return $membertypes;

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
