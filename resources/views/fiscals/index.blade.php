@extends('wrapper')

@section('headerscripts')
    {{--commmon header script for this module and individual files for this page--}}





@stop

@section('title')
    List of recorded fiscal years
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
                <th>Type</th>
                <th>Fiscal Year Status</th>
                <th >Actions</th>


            </tr>
            </thead>
            <tbody>
            @if($fiscals ->count())
                @foreach($fiscals as $fiscal )
                    <tr>
                        <td>
                            {{ $fiscal->id }}
                        </td>
                        <td>

                            {!! $fiscal->title !!}

                        </td>
                        <td>

                          From  {!! $fiscal->durationFromBs !!} To {!! $fiscal->durationToBs !!}

                        </td>
                        <td>

                            @if( $fiscal->status == 0)
                                <div class="btn btn-xs btn-danger">
                                    <i class="ace-icon fa fa-exclamation-circle bigger-110"></i>

                                    Previous/Upcoming

                                </div>

                            @else
                                <div class="btn btn-xs btn-success">
                                    <i class="ace-icon ace-icon glyphicon glyphicon-ok bigger-110"></i>

                                    Current

                                </div>
                            @endif

                        </td>

                        <td><a href="/staff/fiscals/{{ $fiscal->id }}/edit" class="btn btn-xs btn-warning">
                                <i class="ace-icon fa fa-pencil align-top bigger-125"></i> Update
                            </a>

                            <a href="/staff/fiscals/{{ $fiscal->id }}/fees" class="btn btn-xs btn-danger ">
                                <i class="fa fa-money" aria-hidden="true"></i>
                                Setup Fees
                            </a>
                            <a href="/staff/fiscals/{{ $fiscal->id }}/fines" class="btn btn-xs btn-warning ">
                                <i class="ace-icon fa fa-exclamation-triangle bigger-120" aria-hidden="true"></i>
                                Setup fine
                            </a>
                        </td>
                    </tr>

                @endforeach
            @endif
            </tbody>
        </table>
        <br>{{ $fiscals->links() }}


        {{--end--}}
    </div>


@stop

@section('footerscripts')


@stop


