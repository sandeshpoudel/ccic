@extends('wrapper')

@section('headerscripts')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/nepalidatepicker/js/bootstrap.min.js') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/nepalidatepicker/nepali.datepicker.v2.2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('components/chosen/chosen.css') }}" />
    <link rel="stylesheet" href="{{ asset('components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}" />
    <script>
        var $ = jQuery.noConflict();
    </script>
    {{--commmon header script for this module and individual files for this page--}}
@stop

@section('title')
    Note:: You are creating a renewal invoice for <b>{{ $member->name }}</b>, Member id: {{ $member->id }}
@stop

@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif




    {!! Form::open(['url' => 'staff/invoices', 'class' => 'form-horizontal']) !!}

    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
                    <b>Company Info</b>
                </div>
            </div>

            <div>
                <ul class="list-unstyled spaced">
                    <li>
                        <i class="ace-icon fa fa-caret-right blue"></i>{{ $member->name }}
                    </li>

                    <li>
                        <i class="ace-icon fa fa-caret-right blue"></i>{{ $member->location->title }}
                    </li>

                    <li>
                        <i class="ace-icon fa fa-caret-right blue"></i>{{ $member->chowk }}
                    </li>

                    <li>
                        <i class="ace-icon fa fa-caret-right blue"></i>
                        Phone:
                        <b class="red">{{ $member->phone }}</b>
                    </li>

                    <li>
                        <i class="ace-icon fa fa-caret-right blue"></i>
                        Membership Number: {{ $member->id }}






                    </li>


                </ul>
            </div>
        </div><!-- /.col -->

        <div class="col-sm-6">
            <div class="row">
                <div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
                    <b>Customer Info</b>
                </div>
            </div>

            <div>
                <ul class="list-unstyled  spaced">


                    <li> {!! Form::hidden('member_id',$member->id) !!}{!! Form::hidden('operationof',"renew") !!}
                        <div class="form-group {{ $errors->has('paymentby') ? ' has-error' : '' }}">
                            {{ Form::label('paymentby', 'Received By:', ['class' => 'col-sm-3 control-label']) }}
                            <div class="col-sm-9">
                                {!! Form::text('paymentby',Auth::user()->name, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                            </div>

                        </div>
                    </li>

                    <li>
                        <div class="form-group {{ $errors->has('duedate') ? ' has-error' : '' }}">
                            {{ Form::label('duedate', 'Due Date:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
                            <div class="col-sm-9">
                                {!! Form::text('duedate',$fiscal->durationFromBs, ['class' => 'col-xs-10 col-sm-10']) !!}
                                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
                            {{ Form::label('date', 'Billing Date:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
                            <div class="col-sm-9">
                                {!! Form::text('date',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'nepaliDateFrom']) !!}
                                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                            </div>
                        </div>
                    </li>



                </ul>
            </div>
        </div><!-- /.col -->
    </div>
    <div class="space"></div>
    <div>
        <table class="table table-striped table-bordered" id="tableSocProducts">
            <thead>
            <tr>

                <th>Heading</th>
                <th>For Fiscal Year</th>
                <th>Due on</th>
                <th class="hidden-xs">Description</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>


            <!-- foreach loop for each fiscal years -->
            @foreach($fiscalsinbetween as $year)
                <tr>

                    {{-- item--}}
                    <td>
                        <div class="form-group {{ $errors->has('imvoiceable_id') ? ' has-error' : '' }}">

                            <div class="col-xs-12">
                                {!! Form::select('invoiceitem[invoiceable_id][]', $invoiceables, $invoiceable->id, ['placeholder' => 'Select One', 'class' => 'chosen-selects']) !!}
                                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                            </div>

                        </div>
                    </td>
                    {{-- for fiscal year--}}
                    <td>
                        <div class="form-group {{ $errors->has('fiscal_id') ? ' has-error' : '' }}">


                            <div class="col-xs-12">
                                {!! Form::select('invoiceitem[fiscal_id][]', $fiscals, $year->id, ['placeholder' => 'Select One', 'class' => 'chosen-selects']) !!}
                                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                            </div>

                        </div>
                    </td>
                    {{-- item due on--}}
                    <td>
                        <div class="form-group {{ $errors->has('itemdue') ? ' has-error' : '' }}">

                            <div class="col-sm-12">
                                {!! Form::text('invoiceitem[itemdue][]',$year->durationFromAd, ['class' => 'col-xs-11 col-sm-11 date-picker', 'id'=>'form-field-icon-2']) !!}
                                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                            </div>

                        </div>
                    </td>
                    {{-- description--}}
                    <td class="hidden-xs">
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">

                            <div class="col-sm-12">
                                {!! Form::textarea('invoiceitem[description][]','Renewal fee for fiscal year '.$year->title.'', ['class' => 'col-xs-11 col-sm-11', 'id'=>'form-field-icon-2', 'rows' => '2']) !!}
                                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                            </div>

                        </div>
                    </td>
                    {{-- amount--}}
                    <td>
                        <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">

                            <div class="col-sm-12">
                                @if($member->nationality == "NP")
                                    {!! Form::text('invoiceitem[amount][]', $year->fee->where('membershiptype_id', $member->membershiptype->id)->where('capitalfrom', '<=', $member->capital)->where('capitalto', '>=', $member->capital)->first()->renew, ['class' => 'col-xs-11 col-sm-11', 'id'=>'form-field-icon-2']) !!}
                                @else
                                    {!! Form::text('invoiceitem[amount][]', $year->fee->where('membershiptype_id', $member->membershiptype->id)->where('capitalfrom', '<=', $member->capital)->where('capitalto', '>=', $member->capital)->first()->renew * 2, ['class' => 'col-xs-11 col-sm-11', 'id'=>'form-field-icon-2']) !!}
                                @endif
                                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                            </div>

                        </div>

                    </td>
                    <td>


                        <button id="addNewItem" name="addNewItem" type="button" class="btn btn-xs btn-success add"><i class="fa fa-plus-circle"></i></button>
                        <button id="removeItem" name="removeItem" type="button" class="btn btn-xs btn-danger remove"><i class="fa fa-times "></i></button>

                    </td>
                </tr>
            @endforeach

            <!-- end foreach loop -->

            @if($finerate != 0)
                <!-- if fine is applicable -->
                <tr>

                    {{-- item--}}
                    <td>
                        <div class="form-group {{ $errors->has('imvoiceable_id') ? ' has-error' : '' }}">

                            <div class="col-xs-12">
                                {!! Form::select('invoiceitem[invoiceable_id][]', $invoiceables, 2, ['placeholder' => 'Select One', 'class' => 'chosen-selects']) !!}
                                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                            </div>

                        </div>
                    </td>
                    {{-- for fiscal year--}}
                    <td>
                        <div class="form-group {{ $errors->has('fiscal_id') ? ' has-error' : '' }}">


                            <div class="col-xs-12">
                                {!! Form::select('invoiceitem[fiscal_id][]', $fiscals, $fiscal->id, ['placeholder' => 'Select One', 'class' => 'chosen-selects']) !!}
                                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                            </div>

                        </div>
                    </td>
                    {{-- item due on--}}
                    <td>
                        <div class="form-group {{ $errors->has('itemdue') ? ' has-error' : '' }}">

                            <div class="col-sm-12">
                                {!! Form::text('invoiceitem[itemdue][]',Carbon\Carbon::today()->toDateString(), ['class' => 'col-xs-11 col-sm-11 date-picker', 'id'=>'form-field-icon-2']) !!}
                                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                            </div>

                        </div>
                    </td>
                    {{-- description--}}
                    <td class="hidden-xs">
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">

                            <div class="col-sm-12">

                                {!! Form::textarea('invoiceitem[description][]','Fine for unpaid renewal(s) of '.$fiscalsinbetween->count().' fiscal years('. $fiscalsinbetween->implode('title', ' - ') .') @ of '.$finerate.'%', ['class' => 'col-xs-11 col-sm-11', 'id'=>'form-field-icon-2', 'rows' => '2']) !!}
                                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                            </div>

                        </div>
                    </td>
                    {{-- amount--}}
                    <td>
                        <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">

                            <div class="col-sm-12">
                                @if($member->nationality == "NP")
                                    {!! Form::text('invoiceitem[amount][]', ($finerate / 100) *  $fee->renew, ['class' => 'col-xs-11 col-sm-11', 'id'=>'form-field-icon-2']) !!}
                                @else
                                    {!! Form::text('invoiceitem[amount][]', ($finerate / 100) * $fee->renew * 2, ['class' => 'col-xs-11 col-sm-11', 'id'=>'form-field-icon-2']) !!}
                                @endif

                                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                            </div>

                        </div>

                    </td>
                    <td>


                        <button id="addNewItem" name="addNewItem" type="button" class="btn btn-xs btn-success add"><i class="fa fa-plus-circle"></i></button>
                        <button id="removeItem" name="removeItem" type="button" class="btn btn-xs btn-danger remove"><i class="fa fa-times "></i></button>

                    </td>
                </tr>
            @endif

            <!-- end of if fine is applicable -->


            </tbody>
        </table>


        @include('invoices._finaldetails')
    </div>


    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            {!! Form::button('<i class="ace-icon fa fa-floppy-o bigger-160"> </i> Submit',  ['class' => 'btn btn-success', 'type' => 'submit']) !!}
            &nbsp; &nbsp; &nbsp;
            {!! Form::button('<i class="ace-icon fa fa-print bigger-160"></i> </i> Print',  ['class' => 'btn btn-info', 'type' => 'print', 'value' => 'print', 'name'=>'print']) !!}

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

//


            $('#nepaliDateFrom').val(getNepaliDate()).nepaliDatePicker({
                ndpEnglishInput: 'englishDateFrom',
                npdMonth: true,
                npdYear: true,
                npdYearCount: 10
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





    <script src="{{ asset('components/chosen/chosen.jquery.js')}}"></script>
    <script src="{{ asset('components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js"></script>--}}

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






    {{--commmon header script for this module and individual files for this page--}}
@stop