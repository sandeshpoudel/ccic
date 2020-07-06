<?php

namespace App\Http\Controllers;

use App\Fine;
use App\Fiscal;
use App\Http\Requests\FineRequest;
use Illuminate\Http\Request;

class FinesController extends Controller
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
    public  function create(Fiscal $fiscal)
    {
        //
//        $fees = Fee::latest()->orderBy('id', 'desc')->paginate(50);
        $fines = Fine::where('fiscal_id', $fiscal->id)->orderBy('id', 'desc')->paginate(50);
        $fiscallist = Fiscal::pluck('title','id');
        return view('fines.create', compact('fiscallist', 'fiscal', 'fines'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Fine $fine
     * @param FineRequest $fineRequest
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(Fine $fine, FineRequest $fineRequest)
    {
        //
        $fine->create($fineRequest->all());
        flash('New Fine Scheme Created', 'success')->important();
        return  redirect('staff/fiscals');
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
     * @param Fine $fine
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Fine $fine)
    {

        $fiscal=Fiscal::where('id',$fine->fiscal_id)->first();
        return view('fines.edit', compact('fine','fiscal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FineRequest $fineRequest
     * @param Fine $fine
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function update(FineRequest $fineRequest, Fine $fine)
    {
        //
//        return $fineRequest->all();

        $fine->update($fineRequest->all());
        flash('Fine  Details updated successfully', 'success')->important();
        return redirect('staff/fiscals/'.$fine->id.'/fines');
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
