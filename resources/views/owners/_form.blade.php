{{--input for title--}}
<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
    {{ Form::label('name', 'Title:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::text('name',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'form-field-icon-2']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>
</div>

{{--input for nepali--}}
<div class="form-group {{ $errors->has('nepali') ? ' has-error' : '' }}">
    {{ Form::label('nepali', 'Nepali:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::text('nepali',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'transliterateTextarea']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>
</div>