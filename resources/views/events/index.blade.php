@extends('wrapper')

@section('headerscripts')
    {{--commmon header script for this module and individual files for this page--}}

    <script>
        var $ = jQuery.noConflict();
    </script>

@stop

@section('title')
    Event List
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
                <th>Description</th>
                <th>Event Start Date</th>
                <th>Event End Date</th>
                <th >Actions</th>


            </tr>
            </thead>
            <tbody>
            @if($events ->count())
                @foreach($events as $event )
                    <tr>
                        <td>
                            {{ $event->id }}
                        </td>
                        <td>

                            {!! $event->title !!} ( {{ $event->representative->count() }} )

                        </td>
                        <td>
                            {{ $event->description }}
                        </td>


                        <td>{{ $event->start }}</td>
                        <td>{{ $event->end }}</td>
                        <td><a href="/staff/events/{{ $event->id }}/edit" class="btn btn-xs btn-warning">
                                <i class="ace-icon fa fa-pencil align-top bigger-125"></i> Update
                            </a>
                            <a href="/staff/events/{{ $event->id }}/export" class="btn btn-xs btn-success">
                                <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                Export Participants
                            </a>
                        </td>
                    </tr>

                @endforeach
            @endif
            </tbody>
        </table>
        <br>{{ $events->links() }}
    </div>


@stop

@section('footerscripts')
    {{--commmon header script for this module and individual files for this page--}}
@stop