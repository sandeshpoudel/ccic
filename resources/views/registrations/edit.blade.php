@extends('wrapper')

@section('headerscripts')
    <link rel="stylesheet" href="{{ asset('components/chosen/chosen.css') }}" />
    <link rel="stylesheet" href="{{ asset('components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/nepalidatepicker/js/bootstrap.min.js') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/nepalidatepicker/nepali.datepicker.v2.2.min.css') }}" />

    {{--commmon header script for this module and individual files for this page--}}


    <script>
        var $ = jQuery.noConflict();
    </script>

@stop

@section('title')
    Edit Member's Registration Detail: {{ $registration->number }}
@stop

@section('content')

    @if ($errors->any())
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




    {!! Form::model($registration,['method'=>'patch','url' => 'staff/registrations/'.$registration->id, 'class' => 'form-horizontal']) !!}
    {{--input for name--}}
    <div class="form-group {{ $errors->$registration->has('name') ? ' has-error' : '' }}">
        {{ Form::label('name', 'Name:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
        <div class="col-sm-9">
            {!! Form::select('authority', [
                    'Municipality Registration'=>'Municipality Registration',
                    'Inland Revenue Department'=>'Inland Revenue Department',
                    'Department of Small Cottage and Industries'=>'Department of Small Cottage and Industries',
                    'Office of Company Registrar'=>'Office of Company Registrar',
                    'Department of Drug Administration'=>'Department of Drug Administration',
                    'District Livestock Services Office'=>'District Livestock Services Office',
                    'District Agriculture Development Office'=>'District Agriculture Development Office',
                    'Cooperative Training and Division Office'=>'Cooperative Training and Division Office',
                    'The Institute of Chartered Accountants of Nepal'=>'The Institute of Chartered Accountants of Nepal',
                    ], null, ['placeholder' => 'Select One', 'class' => 'chosen-select']) !!}
            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
        </div>
    </div>

    {{--input for position--}}
    <div class="form-group {{ $errors->$registration->has('position') ? ' has-error' : '' }}">
        {{ Form::label('number', 'Position:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
        <div class="col-sm-9">
            {!! Form::text('number',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'form-field-icon-2']) !!}
            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
        </div>
    </div>

    {{--input for phone--}}
    <div class="form-group {{ $errors->$registration->has('phone') ? ' has-error' : '' }}">
        {{ Form::label('phone', 'Phone:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
        <div class="col-sm-9">
            {!! Form::text('date',null, ['class' => 'nepali-calendar', 'id'=>'registration_nepalidate']) !!}
            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
        </div>
    </div>

    {{--input for email--}}



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



            $('#registration_nepalidate').nepaliDatePicker({
                npdMonth: true,
                npdYear: true,
                npdYearCount: 10
            });







        });
    </script>
    <script src="{{ asset('components/chosen/chosen.jquery.js')}}"></script>


    <script type="text/javascript">
        jQuery(function($) {






        });
    </script>




    {{--commmon header script for this module and individual files for this page--}}
@stop