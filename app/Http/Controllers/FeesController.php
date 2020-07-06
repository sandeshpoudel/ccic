<?php

namespace App\Http\Controllers;

use App\Fee;
use App\Fiscal;
use App\Http\Requests\FeeRequest;
use App\Membershiptype;
use Illuminate\Http\Request;

class FeesController extends Controller
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
     * @param Fiscal $fiscal
     * @return \Illuminate\Http\Response
     */
    public function create(Fiscal $fiscal)
    {
        //
        $fees = Fee::where('fiscal_id',$fiscal->id)->orderBy('id', 'desc')->paginate(50);
        $membershiptypes = Membershiptype::where('status', '1')->pluck('title','id');
        return view('fees.create', compact('fiscal','fees','membershiptypes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FeeRequest $feeRequest
     * @param Fee $fee
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(FeeRequest $feeRequest, Fee $fee)
    {
        //http://vcci.local/staff/fiscals/1/fees
        $fee->create($feeRequest->all());
        flash('New fee scheme Created', 'success')->important();
        return redirect('staff/fiscals/'.$feeRequest->fiscal_id.'/fees');
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
