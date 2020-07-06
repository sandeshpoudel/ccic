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

<div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
    {{ Form::label('type', 'Type:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {{--{!! Form::text('type',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'form-field-icon-2']) !!}--}}
        {!! Form::select('type', ['Municipality' => 'Municipality','Sub Metropolitan City' => 'Sub Metropolitan City','Metropolitan City' => 'Metropolitan', 'VDC' => 'VDC'], null, ['placeholder' => 'Choose a Location...', 'class' => 'chosen-select']) !!}


        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>

</div>






<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    {{ Form::label('description', 'Description:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::textarea('description',null, ['class' => 'col-xs-10 col-sm-5']) !!}
    </div>
</div>