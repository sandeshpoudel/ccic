@extends('wrapper')

@section('headerscripts')

    {{--commmon header script for this module and individual files for this page--}}


    <script>
        var $ = jQuery.noConflict();
    </script>

@stop

@section('title')
    Edit Ownership Types Details
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




    {!! Form::model($ownershiptype,['method'=>'patch', 'url' => 'staff/ownershiptypes/'.$ownershiptype->id, 'class' => 'form-horizontal']) !!}
    @include('owners._form')


    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            {!! Form::button('<i class="ace-icon fa fa-floppy-o bigger-160"> </i> Update',  ['class' => 'btn btn-success', 'type' => 'submit']) !!}
            &nbsp; &nbsp; &nbsp;
        </div>
    </div>

    {!! Form::close() !!}

@stop

@section('footerscripts')


    {{--commmon header script for this module and individual files for this page--}}
@stop