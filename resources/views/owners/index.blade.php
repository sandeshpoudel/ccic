@extends('wrapper')

@section('headerscripts')
    {{--commmon header script for this module and individual files for this page--}}

    <script>
        var $ = jQuery.noConflict();
    </script>

@stop

@section('title')
    All Available Ownership Types
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
                <th >Actions</th>


            </tr>
            </thead>
            <tbody>
            @if($ownershiptypes->count())
                @foreach($ownershiptypes as $ownershiptype )
                    <tr>
                        <td>
                            {{ $ownershiptype->id }}
                        </td>
                        <td>

                            {!! $ownershiptype->name !!} <span class="badge badge-danger">{{ $ownershiptype->member_count }}</span>

                        </td>
                        <td>

                            {!! $ownershiptype->nepali !!}

                        </td>

                        <td><a href="/staff/ownershiptypes/{{ $ownershiptype->id }}/edit" class="btn btn-xs btn-warning">
                                <i class="ace-icon fa fa-pencil align-top bigger-125"></i> Update
                            </a>
                            <a href="/staff/ownershiptypes/{{ $ownershiptype->id }}/members" class="btn btn-xs btn-success">
                                <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                List Members
                            </a>
                            <a href="/staff/ownershiptypes/{{ $ownershiptype->id }}/export" class="btn btn-xs btn-info">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                Export Members
                            </a>
                        </td>
                    </tr>

                @endforeach
            @endif
            </tbody>
        </table>
        <br>{{ $ownershiptypes->links() }}
    </div>


@stop

@section('footerscripts')
    {{--commmon header script for this module and individual files for this page--}}
@stop


