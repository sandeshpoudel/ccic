<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceivableRequest;
use App\Receivable;
use Illuminate\Http\Request;

class ReceivablesController extends Controller
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
     * @param ReceivableRequest $receivableRequest
     * @param Receivable $receivable
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(ReceivableRequest $receivableRequest, Receivable $receivable)
    {
        //
//        return $receivableRequest->all();
        $receivable->create($receivableRequest->all());
        flash('Receivable details for member added', 'success')->important();
        return redirect('staff/members');
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
     * @param Receivable $receivable
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Receivable $receivable)
    {
        //
        return view('receivables.edit', compact('receivable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ReceivableRequest $receivableRequest
     * @param Receivable $receivable
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function update(ReceivableRequest $receivableRequest, Receivable $receivable)
    {
        //
        $receivable->update($receivableRequest->all());
        flash('Receivable details for member Updated', 'success')->important();
        return redirect('staff/members');
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
