@extends('wrapper')

@section('headerscripts')
    {{--commmon header script for this module and individual files for this page--}}

    <script>
        var $ = jQuery.noConflict();
    </script>

@stop

@section('title')
    All Available Invoiceable Items
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

    <div class="col-xs-12">
        <table id="simple-table" class="table  table-bordered table-hover">
            <thead>
            <tr>
                <th class="center">
                    No.
                </th>
                <th>Title</th>
                <th>Description</th>
                <th>Nepali</th>
                <th class="center" >Status</th>
                <th >Actions</th>

            </tr>
            </thead>
            <tbody>
            {!! Form::open(['url' => 'staff/invoiceables', 'class' => 'form-horizontal']) !!}
            <tr>
                <td class="center">
                    No.
                </td>
                <td>
                    {{--input for title--}}
                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            {!! Form::text('title',null, ['class' => 'col-xs-11 col-sm-11', 'id'=>'form-field-icon-2']) !!}
                            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                        </div>
                    </div>
                </td>
                <td>
                    {{--input for decsription--}}
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            {!! Form::textarea('description',null, ['class' => 'col-xs-11 col-sm-11', 'id'=>'form-field-icon-2', 'rows' => '3']) !!}
                            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                        </div>
                    </div>

                </td>
                <td>
                    {{--input for nepali--}}
                    <div class="form-group {{ $errors->has('nepali') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            {!! Form::text('nepali',null, ['class' => 'col-xs-11 col-sm-11', 'id'=>'transliterateTextarea']) !!}
                            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                        </div>
                    </div>
                </td>

            <td>
                <div class="col-sm-9 center ">
                    {{ Form::radio('status', '0', ['class' => 'ace']) }} Disabled
                    {{ Form::radio('status', '1', ['class' => 'ace'] ) }} Enabled


                </div>
            </td>
                <td >
                    {!! Form::button('<i class="ace-icon fa fa-floppy-o bigger-160"> </i> Add new',  ['class' => 'btn btn-success', 'type' => 'submit']) !!}

                </td>

            </tr>
            {!! Form::close() !!}
            @if($invoiceables->count())
                @foreach($invoiceables as $invoiceable )
                    <tr>
                        <td>
                            {{ $invoiceable->id }}
                        </td>
                        <td>

                            {!! $invoiceable->title !!}

                        </td>
                        <td>

                            {!! $invoiceable->description !!}

                        </td>
                        <td>

                            {!! $invoiceable->nepali !!}

                        </td>
                        <td class="center">
                            @if( $invoiceable->status == 0)
                                <div class="btn btn-xs btn-danger">
                                    <i class="ace-icon fa fa-exclamation-circle bigger-110"></i>

                                    Disabled

                                </div>

                            @else
                                <div class="btn btn-xs btn-success">
                                    <i class="ace-icon ace-icon glyphicon glyphicon-ok bigger-110"></i>

                                    Enabled

                                </div>
                            @endif

                        </td>

                        <td>
                            <a href="/staff/invoiceables/{{ $invoiceable->id }}/edit" class="btn btn-xs btn-warning">
                                <i class="ace-icon fa fa-pencil align-top bigger-125"></i> Update
                            </a>

                        </td>
                    </tr>

                @endforeach
            @endif
            </tbody>
        </table>
        <br>{{ $invoiceables->links() }}
    </div>


@stop

@section('footerscripts')
    {{--commmon header script for this module and individual files for this page--}}
@stop


