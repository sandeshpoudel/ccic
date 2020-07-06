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

    {!! Form::model($fine,['method'=>'patch', 'url' => 'staff/fines/'.$fine->id, 'class' => 'form-horizontal']) !!}

    <div class="container">





                {!! Form::text('fiscal_id',$fiscal->id, ['hidden'=>'hidden']) !!}




        {{--input for durationFromAd--}}
        <div class="form-group {{ $errors->has('durationFromAd') ? ' has-error' : '' }}">
            {{ Form::label('Start', 'Start Date:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('startbs',null, ['class' => 'nepali-calendar', 'id'=>'nepaliDateFrom']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                {!! Form::text('startad',null, [ 'id'=>'englishDateFrom']) !!}

            </div>
        </div>

        {{--input for durationToBs--}}
        <div class="form-group {{ $errors->has('durationFromAd') ? ' has-error' : '' }}">
            {{ Form::label('End', 'End Date:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('endbs',null, ['class' => 'nepali-calendar', 'id'=>'nepaliDateTo']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                {!! Form::text('endad',null, [ 'id'=>'englishDateTo']) !!}

            </div>
        </div>

        <div class="form-group {{ $errors->has('fine') ? ' has-error' : '' }}">
            {{ Form::label('fine', 'Fine in multiples:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('fine',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>




        <!-- Modal -->


    </div>


    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            {!! Form::button('<i class="ace-icon fa fa-floppy-o bigger-160"> </i> Submit',  ['class' => 'btn btn-success', 'type' => 'submit']) !!}
            &nbsp; &nbsp; &nbsp;
            {!! Form::button('<i class="ace-icon fa fa-undo bigger-160"></i> </i> Reset',  ['class' => 'btn btn-warning', 'type' => 'reset']) !!}
        </div>
    </div>

    {!! Form::close() !!}
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