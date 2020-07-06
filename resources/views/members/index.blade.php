@extends('wrapper')

@section('headerscripts')
    {{--commmon header script for this module and individual files for this page--}}

    <script>
        var $ = jQuery.noConflict();
    </script>

@stop

@section('title')
    All Registered Businesses
@stop

@section('content')

    <div class="col-xs-12">
        {!! Form::open(['url' => 'staff/members/search', 'class' => 'form-inline', 'method' =>'get']) !!}

            <input type="text" class="col-xs-8" placeholder="Keyword" name="keyword">

            <select name="column" class="form-control col-xs-3">
                <option value="id">Member Id</option>
                <option value="name">Business Name</option>
                <option value="proprietorMobile">Proprietor Mobile</option>
                <option value="proprietorName">Proprietor Name</option>
            </select>


            <button type="submit" class="btn btn-info btn-sm">
                <i class="ace-icon fa fa-search bigger-110"></i>Search
            </button>
        {!! Form::close() !!}
        <div class="hr"> </div>
        @php
            if(!isset($lang))
                $lang = "eng";
        @endphp

        <table id="simple-table" class="table  table-bordered table-hover">
            <thead>
            <tr>
                <th class="center">
                    No.
                </th>
                <th>Name </th>
                <th>Category</th>
                <th>Address</th>
                <th >Phone</th>
                <th >Mobile</th>
                <th >Membership Status</th>
                <th >Proprietor</th>
                <th >Actions</th>


            </tr>
            </thead>
            <tbody>
            @if($members->count())
                @foreach($members as $member )
                    <tr>
                        <td>
                            {{ $member->id }}
                        </td>
                        <td>
                            @if($lang == "nep")
                                {!! is_object($member->nepalidetail) ?  $member->nepalidetail->name : $member->name !!}
                            @else
                            {!! $member->name !!}
                            @endif


                        </td>
                        <td>
                            @if($lang == "nep")
                                {{ $member->category->nepali != "" ? $member->category->nepali :  $member->category->title }}
                                

                            @else
                                {{ $member->category->title }}
                            @endif

                            </td>
                        <td>
                            @if($lang == "nep")
{{--                                {{ $member->location->nepali != "" ? $member->location->nepali :  $member->location->title}}--}}
                                {{  $member->location->nepali   }},   {{ $member->ward }}, {{ is_object($member->nepalidetail) != "" ? $member->nepalidetail->fulladdress :  "" }}
                            @else
                                {{ $member->location->title }} {{ $member->ward }}
                            @endif





                                <br> 
                        </td>
                        <td>
                            {{ $member->phone }}
                        </td>
                        <td>
                            {{ $member->proprietorMobile }}
                        </td>
                        <td>
                            <span class="label label-xlg" style="background-color: {{ $member->membershipstatus->colour }}">
                                @if($lang == "nep")
                                    {{ $member->membershipstatus->nepali != "" ? $member->membershipstatus->nepali :  $member->membershipstatus->title }}
                                @else
                                    {{ $member->membershipstatus->title }}
                                @endif
                            </span>
                        </td>
                        <td>
                            @if($lang == "nep")
                                {!! is_object($member->nepalidetail) ?  $member->nepalidetail->propritorsname :  $member->proprietorName !!}
                            @else
                                {{ $member->proprietorName }}
                            @endif
                        </td>

                        <td>
                            <a href="/staff/members/{{ $member->id }}/edit" class="btn btn-xs btn-warning">
                                <i class="ace-icon fa fa-pencil align-top bigger-125"></i> Update
                            </a>
                        </td>
                    </tr>

                @endforeach
            @endif
            </tbody>
        </table>
        <br>{{ $members->appends(Request::except('page'))->links() }}
    </div>


@stop

@section('footerscripts')
    {{--commmon header script for this module and individual files for this page--}}
@stop