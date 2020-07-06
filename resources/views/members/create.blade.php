@extends('wrapper')

@section('headerscripts')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/nepalidatepicker/js/bootstrap.min.js') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/nepalidatepicker/nepali.datepicker.v2.2.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('components/chosen/chosen.css') }}" />
    <link rel="stylesheet" href="{{ asset('components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}" />
    {{--commmon header script for this module and individual files for this page--}}


    <script>
        var $ = jQuery.noConflict();
    </script>

@stop

@section('title')
    Create new Member
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




    {!! Form::open(['url' => 'staff/members', 'class' => 'form-horizontal']) !!}


   @include('members._form')



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


        //    ========================

            $('#applicationDateInBS').nepaliDatePicker({
                ndpEnglishInput: 'applicationDateInAD',
                npdMonth: true,
                npdYear: true,
                npdYearCount: 10
            });

            $('#applicationDateInAD').change(function(){
                $('#applicationDateInBS').val(AD2BS($('#applicationDateInAD').val()));

            });


            $('#applicationApprovalDateInBS').nepaliDatePicker({
                ndpEnglishInput: 'applicationApprovalDateInAD',
                npdMonth: true,
                npdYear: true,
                npdYearCount: 10
            });

            $('#applicationApprovalDateInAD').change(function(){
                $('#applicationApprovalDateInBS').val(AD2BS($('#applicationApprovalDateInAD').val()));

            });


        });
    </script>
    <script src="{{ asset('components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset('components/chosen/chosen.jquery.js')}}"></script>


    <script type="text/javascript">


        var editableProducts = {

            options: {
                table: "#tableSocProducts"
            },
            initialize: function() {
                this
                    .setVars()
                    .events();
            },
            setVars: function() {
                this.$table = $(this.options.table);
                this.$totalLines = $(this.options.table).find('tr').length - 1;
                return this;
            },
            updateLines: function() {
                var totalLines = $(this.options.table).find('tr').length - 1;
                if (totalLines <= 1) {
                    $('.remove').hide();
                    $('.add').show();
                }

                return this;
            },
            events: function() {
                var _self = this;

                _self.updateLines();

                this.$table
                    .on('click', 'button.add', function(e) {
                        e.preventDefault();
                        //---------------------------------------

                        var $tr = $(this).closest('tr');
                        var $clone = $tr.clone();
                        $clone.find(':text').val('');
                        $tr.after($clone);

                        if (_self.setVars().$totalLines > 1) {
                            $('.remove').show();
                        }

                        $tr.find('.add').hide();

                    })
                    .on('click', 'button.remove', function(e) {
                        e.preventDefault();
                        //---------------------------------------

                        var $tr = $(this).closest('tr')
                        $tr.remove();

                        if (_self.setVars().$totalLines <= 1) {
                            $('.remove').hide();
                            $('.add').show();
                        }
                        //if have delete last button with button add visible, add another button to last tr
                        if (_self.setVars().$totalLines > 1) {
                            _self.$table.find('tr:last').find('.add').show();
                        }

                    });

                return this;
            }
        };

        $(function() {
            editableProducts.initialize();
        });

    </script>


    <script type="text/javascript">

        jQuery(function($) {

            if(!ace.vars['touch']) {
                $('.chosen-select').chosen({allow_single_deselect:true});
                //resize the chosen on window resize

                $(window)
                    .off('resize.chosen')
                    .on('resize.chosen', function() {
                        $('.chosen-select').each(function() {
                            var $this = $(this);
//                            $this.next().css({'width': $this.parent().width()});
                            $this.next().css({'width': '90%'});
                        })
                    }).trigger('resize.chosen');
//                resize chosen on sidebar collapse/expand
                $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                    if(event_name != 'sidebar_collapsed') return;
                    $('.chosen-select').each(function() {
                        var $this = $(this);
                        $this.next().css({'width': '90%'});
                    })
                });



            }

            //datepicker plugin
            //link
            $('body').on('focus',".date-picker", function(){
                $(this).datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: 'yyyy-mm-dd'
                })
            })




            //or change it into a date range picker
            $('.input-daterange').datepicker({autoclose:true,  dateFormat: "yy-mm-dd"});


            //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
            $('input[name=date-range-picker]').daterangepicker({
                'applyClass' : 'btn-sm btn-success',
                'cancelClass' : 'btn-sm btn-default',
                locale: {
                    applyLabel: 'Apply',
                    cancelLabel: 'Cancel',
                }
            })
                .prev().on(ace.click_event, function(){
                $(this).next().focus();
            });


            $('#timepicker1').timepicker({
                minuteStep: 1,
                showSeconds: true,
                showMeridian: false,
                disableFocus: true,
                icons: {
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down'
                }
            }).on('focus', function() {
                $('#timepicker1').timepicker('showWidget');
            }).next().on(ace.click_event, function(){
                $(this).prev().focus();
            });

        });
    </script>





    <script type="text/javascript">
        jQuery(function($) {
            $('#gritter-center').on(ace.click_event, function(){
                $.gritter.add({
                    title: 'This is a centered notification',
                    text: 'Just add a "gritter-center" class_name to your $.gritter.add or globally to $.gritter.options.class_name',
                    class_name: 'gritter-info gritter-center' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
                });

                return false;
            });

        });





    </script>







    {{--commmon header script for this module and individual files for this page--}}
@stop