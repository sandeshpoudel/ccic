@extends('wrapper')

@section('headerscripts')
    <link rel="stylesheet" href="{{ asset('components/chosen/chosen.css') }}" />
    <link rel="stylesheet" href="{{ asset('components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/nepalidatepicker/js/bootstrap.min.js') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/nepalidatepicker/nepali.datepicker.v2.2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colorbox.min.css') }}" />

    {{--commmon header script for this module and individual files for this page--}}


    <script>
        var $ = jQuery.noConflict();
    </script>

@stop

@section('title')
    Edit Details for {{ $member->name }} <span class="badge badge-success">{{ $member->id }}</span>
@stop

@section('content')


    @if ($errors->isNotEmpty())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{--@if (count($errors->membercontacts) > 0)--}}
        {{--@include('parts._error')--}}
    {{--@elseif(count($errors) > 0)--}}
        {{--@include('parts._error')--}}
    {{--@elseif(count($errors->registrations) > 0)--}}
        {{--@include('parts._error')--}}
    {{--@elseif(count($errors->receivables) > 0)--}}
        {{--@include('parts._error')--}}
    {{--@endif--}}


    <div class="tabbable">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active ">
                <a data-toggle="tab" href="#details">
                    <i class="green ace-icon fa fa-home bigger-120"></i>
                    Business Details
                </a>
            </li>

            <li >
                <a data-toggle="tab" href="#contacts" style="{{ count($errors->membercontacts) > 0 ? 'color:#a94442; background-color: #f2dede;' : '' }}">
                    <i class="green ace-icon fa fa-envelope bigger-120"></i>
                    Contacts
                    {!! count($errors->membercontacts) > 0 ? '<i class="ace-icon fa fa-asterisk bigger-110 red"></i>' : '' !!}
                </a>
            </li>

            <li >
                <a data-toggle="tab" href="#regs" style="{{ count($errors->registrations) > 0 ? 'color:#a94442; background-color: #f2dede;' : '' }}">
                    <i class="green ace-icon fa fa-folder-open bigger-120"></i>
                    Registrations
                    {!! count($errors->registrations) > 0 ? '<i class="ace-icon fa fa-asterisk bigger-110 red"></i>' : '' !!}
                </a>
            </li>

            <li >
                <a data-toggle="tab" href="#representatives">
                    <i class="green ace-icon fa fa-briefcase bigger-120"></i>
                    Representatives
                </a>
            </li>

            <li >
                <a data-toggle="tab" href="#innepali">
                    <i class="green ace-icon fa fa-briefcase bigger-120"></i>
                    नेपालीमा
                </a>
            </li>
            <li >
                <a data-toggle="tab" href="#invoice">
                    <i class="green ace-icon fa fa-credit-card bigger-120"></i>
                    Invoices
                </a>
            </li>

            <li >
                <a data-toggle="tab" href="#receivables" style="{{ count($errors->receivables) > 0 ? 'color:#a94442; background-color: #f2dede;' : '' }}">
                    <i class="green ace-icon fa fa-folder-open bigger-120"></i>
                    Receivables
                    {!! count($errors->receivables) > 0 ? '<i class="ace-icon fa fa-asterisk bigger-110 red"></i>' : '' !!}
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="details" class="tab-pane fade in active">
                {!! Form::model($member,['method' => 'patch','url' => 'staff/members/'.$member->id, 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                @include('members._form')

                <div class="form-group {{ $errors->has('photo') ? ' has-error' : '' }}">
                    {{ Form::label('photo', 'Member Photo:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
                    <div class="col-sm-9">
                        {!! Form::file('photo',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!} photo should be jpg format and be less than 2 mb
                    </div>
                </div>


                <div class="form-group">
                    @if(is_file(public_path('/storage/members/'.$member->id.'/'.$member->id.'.jpg')))
                                <img width="150" height="150" alt="150x150" src="/storage/members/{{$member->id}}/{{$member->id}}.jpg" />
                    @endif

                </div>


            </div>

        </div>

                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        {!! Form::button('<i class="ace-icon fa fa-floppy-o bigger-160"> </i> Submit',  ['class' => 'btn btn-success', 'type' => 'submit']) !!}
                        &nbsp; &nbsp; &nbsp;
                        {!! Form::button('<i class="ace-icon fa fa-undo bigger-160"></i> </i> Reset',  ['class' => 'btn btn-warning', 'type' => 'reset']) !!}
                    </div>
                </div>

                {!! Form::close() !!}

            </div>

            <div id="contacts" class="tab-pane fade">
                @include('membercontacts.index')
            </div>

            <div id="regs" class="tab-pane fade">
                @include('registrations.index')
            </div>

            <div id="representatives" class="tab-pane fade">
                <p><a class="btn btn-white btn-info btn-bold" href="/staff/members/{{ $member->id }}/representatives/create">
                        <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>
                        Create New Representative for a member
                    </a>

                </p>
                @include('representatives.index')
            </div>

            <div id="innepali" class="tab-pane fade">
                @if(empty($member->nepalidetail))
                    {!! Form::open(['url' => 'staff/members/'.$member->id.'/nepalidetails', 'class' => 'form-horizontal']) !!}
                    {{--input for name--}}
                    @include('nepalidetails._form')

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">

                            {!! Form::button('<i class="ace-icon fa fa-floppy-o bigger-160"> </i> पेश गर्नुहोस्',  ['class' => 'btn btn-success', 'type' => 'submit']) !!}
                            &nbsp; &nbsp; &nbsp;

                        </div>
                    </div>
                    {!! Form::close() !!}


                @else
                    {!! Form::model($member->nepalidetail,['method' => 'patch','url' => 'staff/nepalidetails/'.$member->nepalidetail->id, 'class' => 'form-horizontal']) !!}
                    {{--input for name--}}
                    {{--{!! Form::hidden('member_id',$member->id) !!}--}}
                    @include('nepalidetails._form')


                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            {!! Form::button('<i class="ace-icon fa fa-floppy-o bigger-160"> </i> अद्यावधिक गर्नुहोस्',  ['class' => 'btn btn-success', 'type' => 'submit']) !!}


                        </div>

                    </div>
                    {!! Form::close() !!}
                @endif

            </div>

            <div id="invoice" class="tab-pane fade">
                <p><a class="btn btn-white btn-info btn-bold" href="/staff/members/{{ $member->id }}/invoices/newentry">
                        <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>
                        Create New Membership Invoice
                    </a>
                    <a class="btn btn-white btn-success btn-bold" href="/staff/members/{{ $member->id }}/invoices/renew">
                        <i class="ace-icon fa fa-pencil-square-o bigger-120 green"></i>
                        Create Renewal Invoice
                    </a>

                    <a class="btn btn-white btn-danger btn-bold" href="/staff/members/{{ $member->id }}/invoices/calculateamountdue">
                        <i class="ace-icon fa fa-flask bigger-120 red2"></i>
                        Calculate Amount Due
                    </a>

                    <a class="btn btn-white btn-warning btn-bold" href="/staff/members/{{ $member->id }}/invoices/create">
                        <i class="ace-icon fa fa-circle-o bigger-120 orange"></i>
                        Create Other Invoice
                    </a>
                </p>

                <table id="simple-table" class="table  table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="center">
                            No.
                        </th>
                        <th>Received By</th>
                        <th>Invoice Total</th>
                        <th >Paid Amount</th>
                        <th >Due Amount</th>
                        <th >Status</th>
                        <th >Actions</th>


                    </tr>
                    </thead>
                    <tbody>
                    @if($member->invoice->count())
                        @foreach($member->invoice as $invoice )
                            <tr>
                                <td>
                                    {{ $invoice->id }}
                                </td>
                                <td>

                                    {!! $invoice->paymentby !!}

                                </td>
                                <td>
                                    {{ $invoice->total }}
                                </td>
                                <td>

                                    {{ $invoice->paidamount }}

                                </td>
                                <td>
                                    {{ $invoice->total - $invoice->paidamount }}
                                </td>
                                <td>
                                    {{ $invoice->status }}
                                </td>
                                <td>
                                    <a href="/staff/invoices/{{ $invoice->id }}/edit" class="btn btn-xs btn-warning">
                                        <i class="ace-icon fa fa-pencil align-top bigger-125"></i> Update
                                    </a>
                                    <a href="/staff/invoices/{{ $invoice->id }}" class="btn btn-xs btn-success">
                                        <i class="ace-icon fa fa-print align-top bigger-125"></i> Print
                                    </a>
                                </td>
                            </tr>

                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

            <div id="receivables" class="tab-pane fade">
                @include('receivables.index')
            </div>

        </div>
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

            $('#registration_nepalidate').nepaliDatePicker({
                npdMonth: true,
                npdYear: true,
                npdYearCount: 10
            });

            $('#receivable_receiveddate').nepaliDatePicker({
                npdMonth: true,
                npdYear: true,
                npdYearCount: 10
            });

            $('#receivable_issuedate').nepaliDatePicker({
                npdMonth: true,
                npdYear: true,
                npdYearCount: 10
            });






        });
    </script>
    <script src="{{ asset('components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset('components/chosen/chosen.jquery.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.colorbox.min.js')}}"></script>
    <script type="text/javascript">
        jQuery(function($) {

            //datepicker plugin
            //link
            $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd'
            })
            //show datepicker when clicking on the icon
                .next().on(ace.click_event, function(){
                $(this).prev().focus();
            });

            if(!ace.vars['touch']) {
                $('.chosen-select').chosen({allow_single_deselect:true});
                //resize the chosen on window resize

                $(window)
                    .off('resize.chosen')
                    .on('resize.chosen', function() {
                        $('.chosen-select').each(function() {
                            var $this = $(this);
//                            $this.next().css({'width': $this.parent().width()});
                            $this.next().css({'width': '83%'});
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




            var $overflow = '';
            var colorbox_params = {
                rel: 'colorbox',
                reposition:true,
                scalePhotos:true,
                scrolling:false,
                previous:'<i class="ace-icon fa fa-arrow-left"></i>',
                next:'<i class="ace-icon fa fa-arrow-right"></i>',
                close:'&times;',
                current:'{current} of {total}',
                maxWidth:'100%',
                maxHeight:'100%',
                onOpen:function(){
                    $overflow = document.body.style.overflow;
                    document.body.style.overflow = 'hidden';
                },
                onClosed:function(){
                    document.body.style.overflow = $overflow;
                },
                onComplete:function(){
                    $.colorbox.resize();
                }
            };
            $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
            $("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon


            $(document).one('ajaxloadstart.page', function(e) {
                $('#colorbox, #cboxOverlay').remove();
            });
        });
    </script>




    {{--commmon header script for this module and individual files for this page--}}
@stop