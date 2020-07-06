<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
    {{ Form::label('title', 'Title:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::text('title',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'form-field-icon-2']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>

</div>

<div class="form-group {{ $errors->has('nepali') ? ' has-error' : '' }}">
    {{ Form::label('nepali', 'Nepali:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::text('nepali',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'transliterateTextarea']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>

</div>

{{--input for fiscal_id--}}
<div class="form-group {{ $errors->has('fiscal_id') ? ' has-error' : '' }}">
    {{ Form::label('fiscal_id', 'Fiscal Year:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::select('fiscal_id', $fiscals, null, ['placeholder' => 'Select One', 'class' => 'chosen-select']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>
</div>



<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    {{ Form::label('description', 'Description:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::textarea('description',null, ['class' => 'col-xs-10 col-sm-5']) !!}
    </div>
</div>




<div class="form-group {{ $errors->has('start') ? ' has-error' : '' }}">
    {{ Form::label('Date', 'Event Date:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-4">
        <div class="input-daterange input-group">
            {{--<input type="text" class="input-sm form-control" name="start" />--}}
            {!! Form::text('start',null, ['class' => 'input-sm form-control', 'id'=>'form-field-icon-2']) !!}
            <span class="input-group-addon">
                        <i class="fa fa-exchange"></i>
            </span>
            {!! Form::text('end',null, ['class' => 'input-sm form-control', 'id'=>'form-field-icon-2']) !!}
            {{--<input type="text" class="input-sm form-control" name="end" />--}}
        </div>

        <!-- /section:plugins/date-time.datepicker -->
    </div>
</div>