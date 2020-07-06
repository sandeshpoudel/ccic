@extends('wrapper')

@section('headerscripts')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/nepalidatepicker/js/bootstrap.min.js') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/nepalidatepicker/nepali.datepicker.v2.2.min.css') }}" />

    {{--commmon header script for this module and individual files for this page--}}


    <script>
        var $ = jQuery.noConflict();
    </script>

@stop

@section('title')
    Edit Receivable: {{ $receivable->name }}
@stop

@section('content')

    @if (count($errors->receivables) > 0)
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




    {!! Form::model($receivable,['method'=>'patch','url' => 'staff/receivables/'.$receivable->id, 'class' => 'form-horizontal']) !!}
    {{--input for name--}}
    <div class="form-group {{ $errors->receivables->has('heading') ? ' has-error' : '' }}">
        {{ Form::label('heading', 'heading:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
        <div class="col-sm-9">
            {!! Form::text('heading',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'form-field-icon-2']) !!}
            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
        </div>
    </div>

    {{--input for position--}}
    <div class="form-group {{ $errors->receivables->has('amount') ? ' has-error' : '' }}">
        {{ Form::label('amount', 'Amount:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
        <div class="col-sm-9">
            {!! Form::text('amount',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'form-field-icon-2']) !!}
            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
        </div>
    </div>

    {{--input for phone--}}
    <div class="form-group {{ $errors->receivables->has('issuedate') ? ' has-error' : '' }}">
        {{ Form::label('issuedate', 'Issued Date:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
        <div class="col-sm-9">
            {!! Form::text('issuedate',null, ['class' => 'col-xs-10 col-sm-5 nepali-calendar', 'id'=>'receivable_issuedate']) !!}
            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
        </div>
    </div>

    {{--input for email--}}
    <div class="form-group {{ $errors->receivables->has('receiveddate') ? ' has-error' : '' }}">
        {{ Form::label('receiveddate', 'Received Date:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
        <div class="col-sm-9">
            {!! Form::text('receiveddate',null, ['class' => 'col-xs-10 col-sm-5 nepali-calendar', 'id'=>'receivable_receiveddate']) !!}
            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
        </div>
    </div>

    <div class="form-group {{ $errors->receivables->has('status') ? ' has-error' : '' }}">
        {{ Form::label('status', 'Status:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
        <div class="col-sm-9">
            {!! Form::text('status',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'form-field-icon-2']) !!}
            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
        </div>
    </div>


    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            {!! Form::hidden('member_id',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
            {!! Form::button('<i class="ace-icon fa fa-floppy-o bigger-160"> </i> Submit',  ['class' => 'btn btn-success', 'type' => 'submit']) !!}
            &nbsp; &nbsp; &nbsp;

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



            $('#receivable_issuedate').nepaliDatePicker({
                npdMonth: true,
                npdYear: true,
                npdYearCount: 10
            });

            $('#receivable_receiveddate').nepaliDatePicker({
                npdMonth: true,
                npdYear: true,
                npdYearCount: 10
            });






        });
    </script>




    {{--commmon header script for this module and individual files for this page--}}
@stop