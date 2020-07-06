@extends('wrapper')

@section('headerscripts')
    {{--commmon header script for this module and individual files for this page--}}
    <link rel="stylesheet" href="{{ asset('components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css') }}" />
    
    <script>
        var $ = jQuery.noConflict();
    </script>

@stop

@section('title')
    Create new status for membership
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




    {!! Form::open(['url' => 'staff/membershipstatuses', 'class' => 'form-horizontal']) !!}
    @include('membershipstatuses._form')


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
    <script src="{{ asset('components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js') }}"></script>
    <!-- inline scripts related to this page -->
    <script type="text/javascript">
        jQuery(function($) {
            $('#colour').colorpicker();
        });
    </script>




    {{--commmon header script for this module and individual files for this page--}}
@stop