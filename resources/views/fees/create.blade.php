@extends('wrapper')

@section('headerscripts')

    {{--commmon header script for this module and individual files for this page--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/nepalidatepicker/js/bootstrap.min.js') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/nepalidatepicker/nepali.datepicker.v2.2.min.css') }}" />


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

    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>

        <strong>
            <i class="ace-icon fa fa-times"></i>
            Attention!
        </strong>
        You are creating Fee scheme for fiscal year {{ $fiscal->title }}

        <br>
    </div>




    <table id="simple-table" class="table  table-bordered table-hover">
        <thead>
        <tr>
            <th class="center">
                No.
            </th>
            <th>Membership Type</th>
            <th>Capital From</th>
            <th>Capital To</th>
            <th >Entry</th>
            <th >Annual</th>
            <th >Renew</th>
            <th >Actions</th>

        </tr>
        </thead>
        <tbody>
        {!! Form::open(['url' => 'staff/fees', 'class' => 'form-horizontal']) !!}
            <tr>
                <td>
                    No.
                </td>
                <td>
                    <div class="form-group {{ $errors->has('membershiptype_id') ? ' has-error' : '' }}">
                        <div class="col-sm-9">
                            {!! Form::select('membershiptype_id', $membershiptypes, null, ['placeholder' => 'Select One', 'class' => 'chosen-select']) !!}
                            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-group {{ $errors->has('capitalfrom') ? ' has-error' : '' }}">
                        <div class="col-sm-9">
                            {!! Form::select('capitalfrom', ['1' => '1','2500001' => '2500001','5000001' => '5000001', '10000001'=>'10000001'], null, ['placeholder' => 'Select One', 'class' => 'chosen-select']) !!}
                            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-group {{ $errors->has('capitalto') ? ' has-error' : '' }}">
                        <div class="col-sm-9">
                            {!! Form::select('capitalto', ['2500000' => '2500000','5000000' => '5000000','10000000' => '10000000','1000000000000' => '1000000000000',
], null, ['placeholder' => 'Select One', 'class' => 'chosen-select']) !!}
                            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                        </div>
                    </div>
                </td>
                <td> <div class="form-group {{ $errors->has('entry') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            {!! Form::text('entry',null, ['class' => 'col-xs-11 col-sm-11', 'id'=>'form-field-icon-2']) !!}
                            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                        </div>
                    </div></td>
                <td>
                    <div class="form-group {{ $errors->has('annual') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            {!! Form::text('annual',null, ['class' => 'col-xs-11 col-sm-11', 'id'=>'form-field-icon-2']) !!}
                            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-group {{ $errors->has('renew') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            {!! Form::text('renew',null, ['class' => 'col-xs-11 col-sm-11', 'id'=>'form-field-icon-2']) !!}
                            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                        </div>
                    </div>
                </td>
                <td>
                    {!! Form::hidden('fiscal_id',$fiscal->id) !!}
                    {!! Form::button('<i class="ace-icon fa fa-floppy-o bigger-160"> </i> Add new',  ['class' => 'btn btn-success', 'type' => 'submit']) !!}
                </td>
            </tr>
        {!! Form::close() !!}

        @if($fees->count())
            @foreach($fees as $fee)

            <tr>
                <td>
                    {{ $fee->id }}
                </td>
                <td>{{ $fee->membershiptype->title }}</td>
                <td>{{ $fee->capitalfrom }}</td>
                <td>{{ $fee->capitalto }}</td>
                <td>{{ $fee->entry }}</td>
                <td>{{ $fee->annual }}</td>
                <td>{{ $fee->renew }}</td>
                <td>{{ $fee->fiscal->title }}</td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <br>{{ $fees->links() }}

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

        });
    </script>
    {{--commmon header script for this module and individual files for this page--}}
@stop