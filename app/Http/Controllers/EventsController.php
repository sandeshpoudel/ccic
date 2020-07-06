<?php

namespace App\Http\Controllers;

use App\Event;
use App\Fiscal;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EventsController extends Controller
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
        $events = Event::latest()->orderBy('id', 'desc')->paginate(50);
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fiscals = Fiscal::pluck('title','id');
        return view('events.create', compact('fiscals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Event $event
     * @param EventRequest $eventRequest
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(Event $event, EventRequest $eventRequest)
    {
        //
        $event->create($eventRequest->all());
        flash('New Event Created Successfully', 'success')->important();
        return redirect('staff/events');
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
     * @param Event $event
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Event $event)
    {
        //
        $fiscals = Fiscal::pluck('title', 'id');
        return view('events.edit', compact('event', 'fiscals'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Event $event
     * @param EventRequest $eventRequest
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function update(Event $event, EventRequest $eventRequest)
    {
        //
        $event->update($eventRequest->all());
        flash('Event detail updated successfully', 'success')->important();
        return redirect('staff/events');
    }


    public function export(Event $event)
    {
        //

        $representatives = $event->representative;

//        return $representatives;

        foreach ($representatives as $representative) {
            $data[]=[
                'Membership No'=>$representative->member->id,
                'Name' =>$representative->name,
                'Nepali'=>$representative->member->nepalidetail  != "" ? $representative->member->nepalidetail->propritorsname : "",
                'Phone'=>$representative->phone,
                'Relation to Business'=>$representative->relation,
                'Business Name'=>$representative->member->name,
                'Business Name Nepali'=>$representative->member->nepalidetail  != "" ? $representative->member->nepalidetail->name : $representative->member->name,
                'Status'=>$representative->member->membershipstatus->title,
                'Category'=>$representative->member->category->title
            ];

        }

        if(empty($data))
        {
            flash('No members to export', 'danger')->important();
            return  redirect('staff/events');
        }
        else{

            Excel::create($event->title, function($excel) use($data) {

                $excel->sheet('Sheet 1', function($sheet) use($data) {

                    $sheet->fromArray($data);

                });

            })->export('xls');
        }


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
