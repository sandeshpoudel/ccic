@extends('wrapper')

@section('headerscripts')
    <link rel="stylesheet" href="{{ asset('components/chosen/chosen.css') }}" />
    <link rel="stylesheet" href="{{ asset('components/bootstrap-daterangepicker/daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}" />

    {{--commmon header script for this module and individual files for this page--}}


    <script>
        var $ = jQuery.noConflict();
    </script>

@stop

@section('title')
    Edit Event Details
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




    {!! Form::model($event,['method'=>'patch', 'url' => 'staff/events/'.$event->id, 'class' => 'form-horizontal']) !!}
    @include('events._form')


    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            {!! Form::button('<i class="ace-icon fa fa-floppy-o bigger-160"> </i> Update',  ['class' => 'btn btn-success', 'type' => 'submit']) !!}
            &nbsp; &nbsp; &nbsp;
        </div>
    </div>

    {!! Form::close() !!}

@stop

@section('footerscripts')
    <script src="{{ asset('components/chosen/chosen.jquery.js')}}"></script>
    <script src="{{ asset('components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('components/moment/moment.js') }}"></script>
    <script src="{{ asset('components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript">
        jQuery(function($) {
            //datepicker plugin
            //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
            //or change it into a date range picker
            $('.input-daterange').datepicker({autoclose:true, format: 'yyyy/mm/dd'});

            if(!ace.vars['touch']) {
                $('.chosen-select').chosen({allow_single_deselect:true});
                //resize the chosen on window resize

                $(window)
                    .off('resize.chosen')
                    .on('resize.chosen', function() {
                        $('.chosen-select').each(function() {
                            var $this = $(this);
//                            $this.next().css({'width': $this.parent().width()});
                            $this.next().css({'width': '41.63%'});
                        })
                    }).trigger('resize.chosen');
//                resize chosen on sidebar collapse/expand
                $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                    if(event_name != 'sidebar_collapsed') return;
                    $('.chosen-select').each(function() {
                        var $this = $(this);
                        $this.next().css({'width': '41.63%'});
                    })
                });



            }

        });
    </script>




    {{--commmon header script for this module and individual files for this page--}}
@stop