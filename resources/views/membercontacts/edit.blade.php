@extends('wrapper')

@section('headerscripts')
    <link rel="stylesheet" href="{{ asset('components/chosen/chosen.css') }}" />
    {{--commmon header script for this module and individual files for this page--}}


    <script>
        var $ = jQuery.noConflict();
    </script>

@stop

@section('title')
    Edit Member's Other Contacts: {{ $membercontact->name }}
@stop

@section('content')

    @if (count($errors->membercontacts) > 0)
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




    {!! Form::model($membercontact,['method'=>'patch','url' => 'staff/membercontacts/'.$membercontact->id, 'class' => 'form-horizontal']) !!}
    {{--input for name--}}
    <div class="form-group {{ $errors->membercontacts->has('name') ? ' has-error' : '' }}">
        {{ Form::label('name', 'Name:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
        <div class="col-sm-9">
            {!! Form::text('name',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'form-field-icon-2']) !!}
            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
        </div>
    </div>

    {{--input for position--}}
    <div class="form-group {{ $errors->membercontacts->has('position') ? ' has-error' : '' }}">
        {{ Form::label('position', 'Position:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
        <div class="col-sm-9">
            {!! Form::text('position',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'form-field-icon-2']) !!}
            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
        </div>
    </div>

    {{--input for phone--}}
    <div class="form-group {{ $errors->membercontacts->has('phone') ? ' has-error' : '' }}">
        {{ Form::label('phone', 'Phone:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
        <div class="col-sm-9">
            {!! Form::text('phone',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'form-field-icon-2']) !!}
            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
        </div>
    </div>

    {{--input for email--}}
    <div class="form-group {{ $errors->membercontacts->has('email') ? ' has-error' : '' }}">
        {{ Form::label('email', 'Email:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
        <div class="col-sm-9">
            {!! Form::text('email',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'form-field-icon-2']) !!}
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


    <script type="text/javascript">
        jQuery(function($) {






        });
    </script>




    {{--commmon header script for this module and individual files for this page--}}
@stop