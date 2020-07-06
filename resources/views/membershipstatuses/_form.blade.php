<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
    {{ Form::label('title', 'Title:', ['class' => 'col-sm-3 control-label no-padding-right text-success']) }}
    <div class="col-sm-9">
        {!! Form::text('title',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'form-field-icon-2']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>

</div>

<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    {{ Form::label('description', 'Description:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::textarea('description',null, ['class' => 'col-xs-10 col-sm-5']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>
</div>

<div class="form-group {{ $errors->has('nepali') ? ' has-error' : '' }}">
    {{ Form::label('nepali', 'Nepali:', ['class' => 'col-sm-3 control-label no-padding-right text-success']) }}
    <div class="col-sm-9">
        {!! Form::text('nepali',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'transliterateTextarea']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>

</div>

<div class="form-group {{ $errors->has('colour') ? ' has-error' : '' }}">
    {{ Form::label('colour', 'Colour Picker:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9 bootstrap-colorpicker">
        {!! Form::text('colour',null, ['class' => 'col-xs-10 col-sm-5', 'id' =>'colour', 'placeholder' => 'click here toselect colour, dont type']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>
</div>