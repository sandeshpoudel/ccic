<?php

namespace App\Http\Controllers;

use App\Fee;
use App\Fine;
use App\Fiscal;
use App\Http\Requests\InvoiceRequest;
use App\Invoice;
use App\Invoiceable;
use App\Member;
use App\Membershipstatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $invoices = Invoice::latest()->orderBy('id', 'desc')->paginate(50);
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Member $member
     * @return \Illuminate\Http\Response
     */
    public function create(Member $member)
    {
        $invoiceables = Invoiceable::latest()->pluck('title','id');
        $fiscals = Fiscal::latest()->pluck('title','id');
        $current_fiscal = Fiscal::where('status', 1)->first();
//        return $current_fiscal;


      return view('invoices.create', compact('member', 'invoiceables', 'fiscals', 'current_fiscal'));
    }

    /**
     * @param Member $member
     * @return \Illuminate\Support\Collection
     */
    public function newentry(Member $member)
    {

       $fiscal = Fiscal::whereDate('durationFromAd', '<=', date("Y-m-d"))
            ->whereDate('durationToAd', '>=', date("Y-m-d"))
            ->first();
        $curfis = Fiscal::where('status',1)->first()->id;

       $fee = $member->membershiptype->fee->where('fiscal_id',$curfis)
           ->where('capitalfrom','<=', $member->capital)
           ->where('capitalto','>=', $member->capital)
           ->first();

        $invoiceables = Invoiceable::latest()->pluck('title','id');
        $invoiceable = Invoiceable::where('id', 3)->first();
        $date = Carbon::today()->toDateString();
        $fiscals = $fiscal->pluck('title','id');
//        return $fee;

        return view('invoices.newentry', compact('member', 'fee', 'invoiceables','invoiceable', 'fiscals', 'fiscal'));

    }


    /**
     * @param Member $member
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    public function renew(Member $member)
    {
        // get all the essential informations

        $currentfiscalyear = Fiscal::where('status', '1')->first();
        $renewedtill = Fiscal::where('id', $member->renewalfailedsince)->first();
        $checkexistinginvoices = $member->invoiceitem->where('invoiceable_id',1)->where('fiscal_id',$currentfiscalyear->id);
        $today = Carbon::today();
        $membershipExpiresOn = Carbon::parse($renewedtill->durationToAd)->addYears(2);

        // check if member has already been renewed

        if($checkexistinginvoices->isNotEmpty())
        {
            flash('2your dues are all cleared till date, you can find your last invoice as # '.$checkexistinginvoices->first()->id.'', 'success')->important();
            return redirect('staff/members/'.$member->id.'/edit');

        }
        else
        {
//            check if due is clear from fiscal year id
            if($renewedtill->title == $currentfiscalyear->title )
            {

                flash('your dues are all cleared till date ', 'success')->important();
                return redirect('staff/members/'.$member->id.'/edit');

            }elseif ($today > $membershipExpiresOn)
            {
//          if membership has expired
                flash('your membership has been expired, please contact administrator' .$membershipExpiresOn, 'success')->important();
                return redirect('staff/members/'.$member->id.'/edit');

            }else{

                // create renewal invoice

                $capital = $member->capital;
                $membershiptype = $member->membershiptype->id;
                $statuses = Membershipstatus::latest()->pluck('title', 'id');
                $invoiceables = Invoiceable::latest()->pluck('title', 'id');
                $invoiceable = Invoiceable::where('id', 1)->first();
                $fiscalsinbetween = Fiscal::whereBetween('durationFromAd', array($renewedtill->durationToAd, $currentfiscalyear->durationToAd))->get();

//              get renewal fee amount
                $fee = Fee::where('membershiptype_id', $membershiptype)
                ->where('fiscal_id', $member->renewalfailedsince)
                ->where('capitalfrom', '<=', (int)$capital)
                ->where('capitalto', '>=', (int)$capital)
                ->first();



//              get fine if applicable
                $finerate = Fine::where('fiscal_id', $fiscalsinbetween->first()->id)
                    ->whereDate('endad', '>=', $today)
                    ->first()
                    ->fine;

//                return $finerate;

                 $fiscal = Fiscal::whereDate('durationToAd', '>=', $renewedtill->durationToAd)
                    ->where('id', '<>', $member->renewalfailedsince)
                    ->first();

//                 return $fiscal;
                $fiscals = $fiscal->pluck('title', 'id');

                $fiscalsinbetween = Fiscal::whereBetween('durationFromAd', array($renewedtill->durationToAd, $currentfiscalyear->durationToAd))
//                    ->with('fee')
                    ->orderBy('title', 'desc')
                    ->get();

                foreach( $fiscalsinbetween as $fib)
                    $ts[] = $fib->fee
                        ->where('membershiptype_id', $member->membershiptype->id)
                        ->where('capitalfrom', '<=', $member->capital)
                        ->where('capitalto', '>=', $member->capital)
                        ->first()->renew;

                $totalfee = collect($ts)->sum();

//                return $totalfee;

//                collect($invoiceRequest->invoiceitem['amount'])->sum()



//                return $fiscalsinbetween->first()->id;

//                return $fee;
                 return view('invoices.renew', compact('member', 'fee', 'invoiceables', 'invoiceable', 'fiscals', 'fiscal', 'fiscalsinbetween', 'finerate', 'statuses', 'totalfee'));
            }
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param Member $member
     * @param InvoiceRequest $invoiceRequest
     * @return Member
     * @internal param Request $request
     */
    public function store(InvoiceRequest $invoiceRequest)
    {




        $member = Member::where('id', $invoiceRequest->member_id)->first();
//        $member['membershipstatus_id'] = 4;
         $invoiceitems = [];
        foreach ($invoiceRequest->invoiceitem as $field => $values) {
            foreach ($values as $index => $value) {
                $invoiceitems[$index][$field] = $value;
                $invoiceitems[$index]['member_id'] = $invoiceRequest->member_id;

            }
        }
        $invoice = $invoiceRequest->all();
        $invoice['paidamount'] = collect($invoiceRequest->invoiceitem['amount'])->sum();
        $invoice['total'] = collect($invoiceRequest->invoiceitem['amount'])->sum() - $invoiceRequest->discount;


//        $invoice['member'] = Member::where('id', $invoiceRequest->member_id)->first();

//        return $member;

//        First create invoice and invoice items
        Invoice::create($invoice)
                  ->invoiceitem()
                  ->createMany($invoiceitems);

//        after that, update membership status

        if($invoiceRequest->operationof == "renew")
        {
            $member->update(['membershipstatus_id' => $invoiceRequest->statuses]);
            $member->update(['renewalfailedsince' => $invoiceRequest->renewalfailedsince]);
        }


//
//                  ->member()
//                ->update('membershipstatus_id', 4);
        flash('Your invoice has been created successfully, please update status of the member in form below', 'success')->important();
////
///
        if( $invoiceRequest->print == "print")
        {
            $invid = Invoice::latest()->first()->id;
            return redirect('/staff/invoices/'.$invid);
        }
        else{
            return redirect('staff/members/'.$invoiceRequest->member_id.'/edit');
        }






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
//        $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
//        return $f->format(1432);
        return view('invoices.print', compact('invoice'));
    }

    public function dotprint(Invoice $invoice)
    {
        //
//        $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
//        return $f->format(1432);
//        return view('invoices.print', compact('invoice'));
        return view('invoices.dot', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Invoice $invoice
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Invoice $invoice)
    {
        //
//        return $invoice->invoiceitem;
        $invoiceables = Invoiceable::latest()->pluck('title','id');
        $fiscals = Fiscal::latest()->pluck('title','id');

        return view('invoices.edit', compact('invoice','invoiceables','fiscals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InvoiceRequest $invoiceRequest
     * @param Invoice $invoice
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function update(InvoiceRequest $invoiceRequest, Invoice $invoice)
    {
        $items = [];
        foreach ($invoiceRequest->invoiceitem as $field => $values) {
            foreach ($values as $index => $value) {
                $items[$index][$field] = $value;
                $items[$index]['member_id'] = $invoiceRequest->member_id;

            }
        }



        $invoiceRequest['total'] = collect($invoiceRequest->invoiceitem['amount'])->sum() - $invoiceRequest->discount;
//
        $invoice->update($invoiceRequest->except('invoiceitem'));
////
        foreach($items as $item) {
            $invoice->invoiceitem()->updateOrCreate(['id' => isset($item['id']) ? $item['id'] : 0],$item);
        }
        flash('Fiscal Year Details updated successfully', 'success')->important();

        return redirect('staff/invoices');


    }

    /**
     * @param Member $member
     * @return string
     * @internal param Fiscal $fiscal
     */
    public function calculateamountdue(Member $member)
    {
        $curfis = Fiscal::where('status',1)->first();
//        $duefiscal = Fiscal::where('id',$member->renewalfailedsince)->first();
        $inv =  $member->invoiceitem->where('invoiceable_id',1)->where('fiscal_id',$curfis->id);

//        return $duefiscal;

//        dd($inv->isEmpty());
        if($inv->isNotEmpty())
        {
            return "1 your dues are all cleared till date";
        }
        else{
            // basic details
            $currentfiscal = Fiscal::where('status',1)->first();
            $duefiscal = Fiscal::where('id',$member->renewalfailedsince)->first();
            $dfa = Carbon::parse($duefiscal->durationFromAd);
            $today = Carbon::today();
            $membershipExpiresOn = Carbon::parse($duefiscal->durationFromAd)->addYears(2);


            if($today > $membershipExpiresOn)
            {
                $allfiscals=Fiscal::whereDate('durationFromAd', '>=', $dfa)
//                ->whereDate('durationFromAd', '<=', $today)
                    ->where('id', '<>', $member->renewalfailedsince)
                    ->get();


                return "2 your membership has been expired, please contact administrator";


            }
            elseif($duefiscal->title == $currentfiscal->title)
            {
                return "your dues are all cleared till date";
            }
            else{
//            return $currentfiscal->title;

                $capital=$member->capital;
                $membershiptype=$member->membershiptype->id;

                // exact renewal amount 50000
                $renewalfee=Fee::where('membershiptype_id', $membershiptype)
                    ->where('fiscal_id', $member->renewalfailedsince)
                    ->where('capitalfrom', '<=', (int)$capital)
                    ->where('capitalto', '>=', (int)$capital)
                    ->first();


                // exact fine rate
                $finerate=Fine::where('fiscal_id', $member->renewalfailedsince)
//                    ->whereDate('startad', '<=', date("Y-m-d"))
                    ->whereDate('endad', '>=', $today)
                    ->first()
                    ->fine;

//
                $allfiscals=Fiscal::whereDate('durationFromAd', '>=', $dfa)
//                ->whereDate('durationFromAd', '<=', $today)
                    ->where('id', '<>', $member->renewalfailedsince)
                    ->get();
//            return $finerate;

//            foreach($allfiscals as $af)
//                echo $af->title;
                return $renewalfee->renew * $allfiscals->count() + (($finerate / 100) *  $renewalfee->renew);
        }


        }

    }

    public function betweendates(Request $request)
    {
//        return $request->all();
//        return Carbon::parse($date)->format('Y-m-d');

//        return $request->all();

         $old = Carbon::parse($request->oldenglish)->format('Y-m-d');
         $new = Carbon::parse($request->newenglish)->format('Y-m-d');
         $action = $request->action;
//
        if($action == "1")
        {
            $invoices = Invoice::latest()
                ->whereBetween('created_at', array($old, $new))
                ->orderBy('id', 'desc')
                ->paginate(50);

            return view('invoices.index', compact('invoices'));
        }
        if($action == "2")
        {
            $invoices = Invoice::latest()
                ->whereBetween('created_at', array($old, $new))
                ->orderBy('id', 'desc')->get();
//            return $invoices;


            foreach ($invoices as $invoice) {
                $data[]=[
                    'invoice id'=>$invoice->id,
                    'member id' =>$invoice->member->id,
                    'name'=>$invoice->member->name,
                    'date'=>$invoice->date,
                    'duedate'=>$invoice->duedate,
                    'invoice total'=>$invoice->total,
                    'paid amount'=>$invoice->paidamount,
                    'Status'=>$invoice->status,
                ];

            }

            if(empty($data))
            {
                flash('No invoices to export', 'danger')->important();
                return  redirect('staff/invoices');
            }
            else{

                Excel::create('invoices from '. $old . 'to' . $new, function($excel) use($data) {

                    $excel->sheet('Sheet 1', function($sheet) use($data) {

                        $sheet->fromArray($data);

                    });

                })->export('xls');
            }


        }


//     return $old;

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function fromid(Request $request)
    {
        $invoices = Invoice::where('id', $request->id)->paginate(50);
        return view('invoices.index', compact('invoices'));
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
