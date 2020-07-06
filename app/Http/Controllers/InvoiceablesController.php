<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceableRequest;
use App\Invoiceable;
use Illuminate\Http\Request;

class InvoiceablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $invoiceables = Invoiceable::latest()->orderBy('id', 'desc')->paginate(50);
        return view('invoiceables.index', compact('invoiceables'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        return "test";
//        return view('invoiceables.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InvoiceableRequest $invoiceableRequest
     * @param Invoiceable $invoiceable
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(InvoiceableRequest $invoiceableRequest, Invoiceable $invoiceable)
    {
        //
//        return $invoiceableRequest->all();
        $invoiceable->create($invoiceableRequest->all());
        flash('New Invoiceable Item Created', 'success')->important();
        return redirect('staff/invoiceables');
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
     * @param Invoiceable $invoiceable
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Invoiceable $invoiceable)
    {
        //
            return view('invoiceables.edit', compact('invoiceable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InvoiceableRequest $invoiceableRequest
     * @param Invoiceable $invoiceable
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function update(InvoiceableRequest $invoiceableRequest, Invoiceable $invoiceable)
    {
        //
//        return $invoiceableRequest->all();
        $invoiceable->update($invoiceableRequest->all());
        flash('Invoiceable Item Updated', 'success')->important();
        return redirect('staff/invoiceables');
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
