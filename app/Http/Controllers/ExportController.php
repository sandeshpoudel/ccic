<?php

namespace App\Http\Controllers;

use App\Category;
use App\Location;
use App\Member;
use App\Membershipstatus;
use App\Membershiptype;
use App\Ownershiptype;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


//use Maatwebsite\Excel\Facades\Excel;
//use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{

    //
    /**
     * @param Category $category
     */


    public function fromCategory(Category $category)
    {
        $members=$category->member()
            ->whereIn('membershipstatus_id', [4,5])
            ->orderBy('id', 'desc')
            ->get();

        foreach ($members as $member) {
            $data[]=[
                'Membership No'=>$member->id,
                'Business Name'=>$member->name,
                'Address'=>$member->location->title . ', ' . $member->ward . ', ' . $member->chowk,
                'Proprietor Name'=>$member->proprietorName,
                'Contact'=>$member->proprietorMobile,
                'Membership Type'=>$member->membershiptype->title,
                'Status'=>$member->membershipstatus->title,
                'Category'=>$member->category->title
            ];

        }


        if(empty($data))
        {
            flash('No members to export', 'danger')->important();
            return  redirect('staff/dashboard');
        }
        else{

            Excel::create($category->title, function($excel) use($data) {

                $excel->sheet('Sheet 1', function($sheet) use($data) {

                    $sheet->fromArray($data);

                });

            })->export('xls');
        }
//        return $members;

        Excel::create($category->title, function($excel) use($data) {

            $excel->sheet('Sheet 1', function($sheet) use($data) {

                $sheet->fromArray($data);

            });

        })->export('xls');

    }

    public function fromMembershiptype(Membershiptype $membershiptype)
    {
        $members=$membershiptype->member()
            ->whereIn('membershipstatus_id', [4,5])
            ->orderBy('id', 'desc')
            ->get();

        foreach ($members as $member) {
            $data[]=[
                'Membership No'=>$member->id,
                'Business Name'=>$member->name,
                'Address'=>$member->location->title . ', ' . $member->ward . ', ' . $member->chowk,
                'Proprietor Name'=>$member->proprietorName,
                'Contact'=>$member->proprietorMobile,
                'Membership Type'=>$member->membershiptype->title,
                'Status'=>$member->membershipstatus->title,
                'Category'=>$member->category->title
            ];

        }
//        return $members;



        if(empty($data))
        {
            flash('No members to export', 'danger')->important();
            return  redirect('staff/dashboard');
        }
        else{

            Excel::create($membershiptype->title, function($excel) use($data) {

                $excel->sheet('Sheet 1', function($sheet) use($data) {

                    $sheet->fromArray($data);

                });

            })->export('xls');
        }
    }

    public function fromMembershipstatus(Membershipstatus $membershipstatus)
    {
        $members=$membershipstatus->member()
            ->whereIn('membershipstatus_id', [4,5])
            ->orderBy('id', 'desc')
            ->get();

        foreach ($members as $member) {
            $data[]=[
                'Membership No'=>$member->id,
                'Business Name'=>$member->name,
                'Address'=>$member->location->title . ', ' . $member->ward . ', ' . $member->chowk,
                'Proprietor Name'=>$member->proprietorName,
                'Contact'=>$member->proprietorMobile,
                'Membership Type'=>$member->membershiptype->title,
                'Status'=>$member->membershipstatus->title,
                'Category'=>$member->category->title
            ];

        }
//        return $members;
        if(empty($data))
        {
            flash('No members to export', 'danger')->important();
            return  redirect('staff/dashboard');
        }
        else{

            Excel::create($membershipstatus->title, function($excel) use($data) {

                $excel->sheet('Sheet 1', function($sheet) use($data) {

                    $sheet->fromArray($data);

                });

            })->export('xls');
        }
    }

    public function fromLocation(Location $location)
    {
        $members=$location->member()
            ->whereIn('membershipstatus_id', [4,5])
            ->orderBy('id', 'desc')
            ->get();

        foreach ($members as $member) {
            $data[]=[
                'Membership No'=>$member->id,
                'Business Name'=>$member->name,
                'Address'=>$member->location->title . ', ' . $member->ward . ', ' . $member->chowk,
                'Proprietor Name'=>$member->proprietorName,
                'Contact'=>$member->proprietorMobile,
                'Membership Type'=>$member->membershiptype->title,
                'Status'=>$member->membershipstatus->title,
                'Category'=>$member->category->title
            ];

        }
//        return $members;
        if(empty($data))
        {
            flash('No members to export', 'danger')->important();
            return  redirect('staff/dashboard');
        }
        else{

            Excel::create($location->title, function($excel) use($data) {

                $excel->sheet('Sheet 1', function($sheet) use($data) {

                    $sheet->fromArray($data);

                });

            })->export('xls');
        }
    }


    public function fromGender(Request $request)
    {
//        return "Im here";
        $gender = "male";
        $members=Member::where('gender',$gender )
            ->whereIn('membershipstatus_id', [4,5])
            ->orderBy('id', 'desc')
            ->get();
//
//        return $members;

        foreach ($members as $member) {
            $data[]=[
                'Membership No'=>$member->id,
                'Business Name'=>$member->name,
                'Address'=>$member->location->title . ', ' . $member->ward . ', ' . $member->chowk,
                'Proprietor Name'=>$member->proprietorName,
                'Contact'=>$member->proprietorMobile,
                'Membership Type'=>$member->membershiptype->title,
                'Status'=>$member->membershipstatus->title,
                'Category'=>$member->category->title
            ];

        }
////        return $members;
        if(empty($data))
        {
            flash('No members to export', 'danger')->important();
            return  redirect('staff/dashboard');
        }
        else{

            Excel::create($gender, function($excel) use($data) {

                $excel->sheet('Sheet 1', function($sheet) use($data) {

                    $sheet->fromArray($data);

                });

            })->export('xls');
        }
    }

    /**
     * @param Ownershiptype $ownershiptype
     */
    public function fromOwnershiptype(Ownershiptype $ownershiptype)
    {
        $members=$ownershiptype->member()
            ->whereIn('membershipstatus_id', [4,5])
            ->orderBy('id', 'desc')
            ->get();
//        return $ownershiptype->name;

//
        foreach ($members as $member) {
            $data[]=[
                'Membership No'=>$member->id,
                'Business Name'=>$member->name,
                'Address'=>$member->location->title . ', ' . $member->ward . ', ' . $member->chowk,
                'Proprietor Name'=>$member->proprietorName,
                'Contact'=>$member->proprietorMobile,
                'Membership Type'=>$member->membershiptype->title,
                'Status'=>$member->membershipstatus->title,
                'Category'=>$member->category->title
            ];

        }


        if(empty($data))
        {
            flash('No members to export', 'danger')->important();
            return  redirect('staff/dashboard');
        }
        else{

            Excel::create($ownershiptype->title, function($excel) use($data) {

                $excel->sheet('Sheet 1', function($sheet) use($data) {

                    $sheet->fromArray($data);

                });

            })->export('xls');
        }

    }
}

