@extends('wrapper')

@section('headerscripts')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/nepalidatepicker/js/bootstrap.min.js') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/nepalidatepicker/nepali.datepicker.v2.2.min.css') }}" />
    {{--commmon header script for this module and individual files for this page--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/accordian.css') }}" />

    <script>
        var $ = jQuery.noConflict();
    </script>

@stop

@section('title')
    All Invoices
@stop

@section('content')

    <div class="row">
        <div class="col-sm-6">
            {!! Form::open(['url' => 'staff/invoices/betweendates', 'class' => 'form-inline']) !!}
            <div class="form-group">

                <div class="col-sm-12">
                    <div class="input-daterange input-group">
                        {{--<input type="text" class="input-sm form-control" name="start" />--}}
                        {!! Form::text('olddate',null, ['class' => 'nepali-calendar input-sm form-control', 'id'=>'olddate', 'placeholder'=>'Old Date']) !!}
                        <span class="input-group-addon">
                        <i class="fa fa-exchange"></i>
            </span>
                        {!! Form::text('newdate',null, ['class' => 'nepali-calendar input-sm form-control', 'id'=>'newdate', 'placeholder'=>'New Date']) !!}
                        {{--<input type="text" class="input-sm form-control" name="end" />--}}
                    </div>

                    <!-- /section:plugins/date-time.datepicker -->
                </div>
            </div>

            {{--<input type="text" class="nepali-calendar col-sm-4" id="olddate" placeholder="Old Date" name="olddate">--}}
            <input type="hidden"  id="oldenglish" placeholder="Old Date" name="oldenglish">
            {{--<input type="text" class="nepali-calendar col-sm-4" id="newdate" placeholder="New Date" name="newdate">--}}
            <input type="hidden" class="nepali-calendar col-sm-4" id="newenglish" placeholder="Old Date" name="newenglish">

            <select name="action" class="form-control col-xs-3">
                <option value="1">List</option>
                <option value="2">Export</option>

            </select>

            <button type="submit" class="btn btn-info btn-sm">
                <i class="ace-icon fa fa-search bigger-110"></i>Get Results
            </button>



            {!! Form::close() !!}
        </div>
        <div class="col-sm-6">

            {!! Form::open(['url' => 'staff/invoices/fromid', 'class' => 'form-inline']) !!}
            <input type="text" class="col-xs-6" placeholder="Enter ID Here" name="id">
            <button type="submit" class="btn btn-info btn-sm">
                <i class="ace-icon fa fa-search bigger-110"></i>Search
            </button>


            {!! Form::close() !!}

        </div>



    </div>

    <div class="hr"></div>

    <div class="col-xs-12">
        <table id="simple-table" class="table  table-bordered table-hover">
            <thead>
            <tr>
                <th class="center">
                    No.
                </th>
                <th>Issued for</th>
                <th>Issued date</th>
                <th>Details</th>
                <th>Invoice Total</th>
                <th >Paid Amount</th>
                <th >Due Amount</th>
                <th >Status</th>
                <th >Actions</th>


            </tr>
            </thead>
            <tbody>
            @if($invoices ->count())
                @foreach($invoices as $invoice )
                    <tr>
                        <td>
                            {{ $invoice->id }}
                        </td>
                        <td>
                            {{ $invoice->date }}
                        </td>
                        <td>

                            {!! $invoice->member->name !!} ( {!! $invoice->member->id !!} )

                        </td>
                        <td>
                            <button class="accordion">Details</button>
                            <div class="panel">

                                @foreach($invoice->invoiceitem as $invoiceitem )
                                    <ul>
                                        <li>{{ $invoiceitem->invoiceable->title }} ({{ $invoiceitem->fiscal->title }})</li>
                                    </ul>
                                @endforeach
                            </div>


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
                            <a href="/staff/invoices/{{ $invoice->id }}/" class="btn btn-xs btn-success">
                                <i class="ace-icon fa fa-print align-top bigger-125"></i> Print
                            </a>

                            <a href="/staff/invoices/{{ $invoice->id }}/dotprint" class="btn btn-xs btn-success">
                                <i class="ace-icon fa fa-print align-top bigger-125"></i> Dot Print
                            </a>

                        </td>
                    </tr>

                @endforeach
            @endif
            </tbody>
        </table>



    </div>
        <br>{{ $invoices->links() }}
    </div>


@stop

@section('footerscripts')




    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>
    {{--commmon header script for this module and individual files for this page--}}
    <script src="{{ asset('assets/nepalidatepicker/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/nepalidatepicker/js/jquery-2.1.0.min.js') }}"></script>

    <script src="{{ asset('assets/nepalidatepicker/nepali.datepicker.v2.2.min.js') }}"></script>

    <script>
        $(document).ready(function(){

            $('#olddate').nepaliDatePicker({
                ndpEnglishInput: 'oldenglish',
                npdMonth: true,
                npdYear: true,
                npdYearCount: 10
            });

            $('#oldenglish').change(function(){
                $('#olddate').val(AD2BS($('#oldenglish').val()));

            });

            $('#newdate').nepaliDatePicker({
                ndpEnglishInput: 'newenglish',
                npdMonth: true,
                npdYear: true,
                npdYearCount: 10
            });

            $('#newenglish').change(function(){
                $('#newdate').val(AD2BS($('#newenglish').val()));

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
@stop