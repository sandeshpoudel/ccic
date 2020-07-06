@extends('wrapper')

@section('headerscripts')
    {{--commmon header script for this module and individual files for this page--}}

    <script>
        var $ = jQuery.noConflict();
    </script>

@stop

@section('title')
    All Available Locations
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
                <th>Type</th>
                <th>Description</th>
                <th >Actions</th>


            </tr>
            </thead>
            <tbody>
            @if($locations ->count())
                @foreach($locations as $location )
                    <tr>
                        <td>
                            {{ $location->id }}
                        </td>
                        <td>

                            {!! $location->title !!} <span class="badge badge-danger">{{ $location->member_count }}</span>

                        </td>
                        <td>

                            {!! $location->nepali !!}

                        </td>
                        <td>

                            {!! $location->type !!}

                        </td>
                        <td>{{ $location->description }}</td>
                        <td><a href="/staff/locations/{{ $location->id }}/edit" class="btn btn-xs btn-warning">
                                <i class="ace-icon fa fa-pencil align-top bigger-125"></i> Update
                            </a>
                            <a href="/staff/locations/{{ $location->id }}/members" class="btn btn-xs btn-success">
                                <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                List Members
                            </a>
                            <a href="/staff/locations/{{ $location->id }}/export" class="btn btn-xs btn-info">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                Export Members
                            </a>
                        </td>
                    </tr>

                @endforeach
            @endif
            </tbody>
        </table>
        <br>{{ $locations->links() }}
    </div>


@stop

@section('footerscripts')
    {{--commmon header script for this module and individual files for this page--}}
@stop


