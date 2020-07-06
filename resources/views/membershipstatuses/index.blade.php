@extends('wrapper')

@section('headerscripts')
    {{--commmon header script for this module and individual files for this page--}}

    <script>
        var $ = jQuery.noConflict();
    </script>

@stop

@section('title')
    All Available Statuses
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
                <th >Actions</th>


            </tr>
            </thead>
            <tbody>
            @if($membershipstatuses ->count())
                @foreach($membershipstatuses as $membershipstatuse )
            <tr>
                <td>
                    {{ $membershipstatuse->id }}
                    </td>
                <td>
                    <span class="label label-xlg" style="background-color: {{ $membershipstatuse->colour }}">
                        {!! $membershipstatuse->title !!}
                    </span> <span class="badge badge-danger">{{ $membershipstatuse->member_count }}</span>
                </td>
                <td>{{ $membershipstatuse->description }}</td>
                <td><a href="/staff/membershipstatuses/{{ $membershipstatuse->id }}/edit" class="btn btn-xs btn-warning">
                        <i class="ace-icon fa fa-pencil align-top bigger-125"></i> Update
                    </a>
                    <a href="/staff/membershipstatuses/{{ $membershipstatuse->id }}/members" class="btn btn-xs btn-success">
                        <i class="fa fa-cloud-download" aria-hidden="true"></i>
                        List Members
                    </a>

                    <a href="/staff/membershipstatuses/{{ $membershipstatuse->id }}/export" class="btn btn-xs btn-info">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        Export Members
                    </a>

                </td>
            </tr>

                @endforeach
            @endif
            </tbody>
        </table>
        <br>{{ $membershipstatuses->links() }}
    </div>


@stop

@section('footerscripts')
    {{--commmon header script for this module and individual files for this page--}}
@stop