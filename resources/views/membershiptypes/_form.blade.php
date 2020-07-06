<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
    {{ Form::label('title', 'Title:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
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
    {{ Form::label('nepali', 'Nepali:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::text('nepali',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'transliterateTextarea']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>

</div>

<div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
    {{ Form::label('status', 'status:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9 ">
        {{ Form::radio('status', '0', ['class' => 'ace']) }} Disabled
        {{ Form::radio('status', '1', ['class' => 'ace'] ) }} Enabled
        {{--{{ Form::radio('status', 'disabled', true, ['class' => 'ace']) }}--}}
        {{--<input name="switch-field-1" class="ace ace-switch ace-switch-4 btn-empty" type="checkbox" />--}}
        <span class="lbl"></span>
        {{--{!! Form::text('colour',null, ['class' => 'col-xs-10 col-sm-5', 'id' =>'colour', 'placeholder' => 'click here toselect colour, dont type']) !!}--}}
        {{--<i class="ace-icon fa fa-asterisk bigger-110 red"></i>--}}
    </div>
</div>