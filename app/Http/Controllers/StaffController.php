<?php

namespace App\Http\Controllers;

use App\Category;
use App\Location;
use App\Member;
use App\Membershipstatus;
use App\Membershiptype;
use App\Ownershiptype;
use Illuminate\Http\Request;

class StaffController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        //
//        return Member::where('membershipstatus_id','!=','1')->get()->count();
        $membershiptypes=Membershiptype::with('member')->withCount('member')->get();
        $membershipstatuses = Membershipstatus::withCount('member')->get();
        $ownershiptypes = Ownershiptype::with('member')->withCount('member')->get();
//        $members = Member::where('membershipstatus_id','!=','1')
//                            ->where('membershipstatus_id', '!=', '6')
//                            ->where('membershipstatus_id', '!=', '2')
//                            ->where('membershipstatus_id', '!=', '3')
//                            ->count();

        $members =Member::whereIn('membershipstatus_id', [4,5])->count();

//        return $membershiptypes;
//        return $members;

//        foreach($membershiptypes as $mt)
//        {
//            return $mt->member->where('membershipstatus_id','!=','1')->count();
//        }

        $male = Member::whereIn('membershipstatus_id', [4,5])->where('gender', 'male')->count();
        $female = Member::whereIn('membershipstatus_id', [4,5])->where('gender', 'female')->count();
        $others = Member::whereIn('membershipstatus_id', [4,5])->where('gender', 'others')->count();


        $categories = Category::pluck('title','id');
        $types = Membershiptype::where('status', '1')->pluck('title','id');
        $locations = Location::pluck('title','id');
        $statuses = Membershipstatus::pluck('title','id');
        $ownerships = Ownershiptype::pluck('name','id');

//        return view('welcome', compact('members','ownershiptypes'));
                return view('dashboard.index', compact('categories','types','locations','statuses','ownerships','members','ownershiptypes','membershiptypes','membershipstatuses', 'male','female', 'others'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
