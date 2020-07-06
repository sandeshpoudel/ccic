


{{--input for position--}}
<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    {{ Form::label('name', 'नाम:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::text('name',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'transliterateTextarea']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>
</div>

{{--input for position--}}
<div class="form-group {{ $errors->has('propritorsname') ? ' has-error' : '' }}">
    {{ Form::label('propritorsname', 'प्रोपाइटर को नाम:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::text('propritorsname',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'transliterateProName']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>
</div>

{{--input for position--}}
<div class="form-group {{ $errors->has('fulladdress') ? ' has-error' : '' }}">
    {{ Form::label('fulladdress', 'टोल  / चोकको नाम:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
	{!! Form::text('fulladdress',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'transliterateAddress']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>
</div>


