@extends('wrapper')

@section('headerscripts')

    {{--commmon header script for this module and individual files for this page--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/nepalidatepicker/js/bootstrap.min.js') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/nepalidatepicker/nepali.datepicker.v2.2.min.css') }}" />


@stop

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>

            <strong>
                <i class="ace-icon fa fa-times"></i>
                Oh snap!
            </strong>
            Something isnt right in the form below. Please check highlighted item.

            <br>
        </div>

    @endif

    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>

        <strong>
            <i class="ace-icon fa fa-times"></i>
            Attention!
        </strong>
        You are creating Fine scheme for fiscal year {{ $fiscal->title }}

        <br>
    </div>

    {!! Form::open(['url' => 'staff/fines', 'class' => 'form-horizontal']) !!}

    <div class="container">
        <table id="simple-table" class="table  table-bordered table-hover">
            <thead>
            <tr>
                <th class="center">
                    No.
                </th>
                <th>Start Date BS</th>
                <th>End Date BS</th>
                <th >Fine</th>
                <th >For Fiscal Year</th>
                <th >Actions</th>

            </tr>
            </thead>
            <tbody>
            {!! Form::open(['url' => 'staff/fees', 'class' => 'form-horizontal']) !!}
            <tr>
                <td>
                    No.
                </td>
                <td>
                    {{--input for durationFromAd--}}
                    <div class="form-group {{ $errors->has('startbs') ? ' has-error' : '' }}">

                        <div class="col-sm-9">
                            {!! Form::text('startbs',null, ['class' => 'nepali-calendar', 'id'=>'nepaliDateFrom']) !!}
                            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                            {!! Form::text('startad',null, [ 'id'=>'englishDateFrom']) !!}

                        </div>
                    </div>
                </td>
                <td>
                    {{--input for durationToBs--}}
                    <div class="form-group {{ $errors->has('durationFromAd') ? ' has-error' : '' }}">

                        <div class="col-sm-9">
                            {!! Form::text('endbs',null, ['class' => 'nepali-calendar', 'id'=>'nepaliDateTo']) !!}
                            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                            {!! Form::text('endad',null, [ 'id'=>'englishDateTo']) !!}

                        </div>
                    </div>
                </td>

                <td>
                    <div class="form-group {{ $errors->has('fine') ? ' has-error' : '' }}">

                        <div class="col-sm-9">
                            {!! Form::text('fine',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                        </div>
                    </div>


                </td>

                <td>
                    {{ $fiscal->title }}{!! Form::hidden('fiscal_id',$fiscal->id) !!}
                </td>
                <td>

                    {!! Form::button('<i class="ace-icon fa fa-floppy-o bigger-160"> </i> Add new',  ['class' => 'btn btn-success', 'type' => 'submit']) !!}
                </td>
            </tr>
            {!! Form::close() !!}
            @if($fines->count())
                @foreach($fines as $fine)

                    <tr>
                        <td>
                            {{ $fine->id }}
                        </td>
                        <td>{{ $fine->startbs }}BS / {{ $fine->startad }} AD</td>
                        <td>{{ $fine->endbs }}BS / {{ $fine->endad }} AD</td>
                        <td>{{ $fine->fine }}</td>
                        <td>{{ $fiscal->title }}</td>

                        <td>
                            <a href="/staff/fines/{{ $fine->id }}/edit" class="btn btn-xs btn-warning">
                                <i class="ace-icon fa fa-pencil align-top bigger-125"></i> Update
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <br>
    </div>
@stop
@section('footerscripts')

    <script src="{{ asset('assets/nepalidatepicker/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/nepalidatepicker/js/jquery-2.1.0.min.js') }}"></script>

    <script src="{{ asset('assets/nepalidatepicker/nepali.datepicker.v2.2.min.js') }}"></script>
    <script>
        $(document).ready(function(){

            $('#nepaliDateFrom').nepaliDatePicker({
                ndpEnglishInput: 'englishDateFrom',
                npdMonth: true,
                npdYear: true,
                npdYearCount: 10
            });

            $('#englishDateFrom').change(function(){
                $('#nepaliDateFrom').val(AD2BS($('#englishDateFrom').val()));

            });

            $('#nepaliDateTo').nepaliDatePicker({
                ndpEnglishInput: 'englishDateTo',
                npdMonth: true,
                npdYear: true,
                npdYearCount: 10
            });

            $('#englishDateTo').change(function(){
                $('#nepaliDateTo').val(AD2BS($('#englishDateTo').val()));

            });

        });
    </script>
    {{--commmon header script for this module and individual files for this page--}}
@stop