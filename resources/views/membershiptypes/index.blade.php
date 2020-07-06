@extends('wrapper')

@section('headerscripts')
    {{--commmon header script for this module and individual files for this page--}}

    <script>
        var $ = jQuery.noConflict();
    </script>

@stop

@section('title')
    All Available Membership Type
@stop

@section('content')

    <div class="col-xs-12">
        <table id="simple-table" class="table  table-bordered table-hover">
            <thead>
            <tr>
                <th class="center">
                    No.
                </th>
                <th>Title</th>
                <th>Nepali</th>
                <th>Description</th>
                <th>Status</th>
                <th >Actions</th>


            </tr>
            </thead>
            <tbody>
            @if($membershiptypes->count())
                @foreach($membershiptypes as $membershiptype )
                    <tr>
                        <td>
                            {{ $membershiptype->id }}
                        </td>

                        <td>

                        {!! $membershiptype->title !!} <span class="badge badge-danger">{{ $membershiptype->member_count }}</span>

                        </td>
                        <td>
                            {{ $membershiptype->nepali }}
                        </td>
                        <td>{{ $membershiptype->description }}</td>
                        <td>
                            @if( $membershiptype->status == 0)
                                <div class="btn btn-xs btn-danger">
                                    <i class="ace-icon fa fa-exclamation-circle bigger-110"></i>

                                    Disabled

                                </div>

                            @else
                                <div class="btn btn-xs btn-success">
                                    <i class="ace-icon ace-icon glyphicon glyphicon-ok bigger-110"></i>

                                    Enabled

                                </div>
                            @endif

                        </td>
                        <td><a href="/staff/membershiptypes/{{ $membershiptype->id }}/edit" class="btn btn-xs btn-warning">
                                <i class="ace-icon fa fa-pencil align-top bigger-125"></i> Update
                            </a>
                            <a href="/staff/membershiptypes/{{ $membershiptype->id }}/members" class="btn btn-xs btn-success">
                                <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                List Members
                            </a>
                            <a href="/staff/membershiptypes/{{ $membershiptype->id }}/export" class="btn btn-xs btn-info">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                Export Members
                            </a>
                        </td>
                    </tr>

                @endforeach
            @endif
            </tbody>
        </table>
        <br>{{ $membershiptypes->links() }}
    </div>


@stop

@section('footerscripts')
    {{--commmon header script for this module and individual files for this page--}}
@stop