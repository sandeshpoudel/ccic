<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
    {{ Form::label('title', 'Title:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::text('title',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'form-field-icon-2']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>

</div>

{{--input for durationFromAd--}}
<div class="form-group {{ $errors->has('durationFromAd') ? ' has-error' : '' }}">
    {{ Form::label('durationFromBs', 'Start Date:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::text('durationFromBs',null, ['class' => 'nepali-calendar', 'id'=>'nepaliDateFrom']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
        {!! Form::text('durationFromAd',null, [ 'id'=>'englishDateFrom']) !!}

    </div>
</div>

{{--input for durationToBs--}}
<div class="form-group {{ $errors->has('durationFromAd') ? ' has-error' : '' }}">
    {{ Form::label('durationToBs', 'End Date:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::text('durationToBs',null, ['class' => 'nepali-calendar', 'id'=>'nepaliDateTo']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
        {!! Form::text('durationToAd',null, [ 'id'=>'englishDateTo']) !!}

    </div>
</div>

<div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
    {{ Form::label('status', 'Is it current fiscal year?:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        <div class="col-sm-9 ">
            {{ Form::radio('status', '1', ['class' => 'ace']) }} Yes
            {{ Form::radio('status', '0', ['class' => 'ace'] ) }} No
            {{--{{ Form::radio('status', 'disabled', true, ['class' => 'ace']) }}--}}
            {{--<input name="switch-field-1" class="ace ace-switch ace-switch-4 btn-empty" type="checkbox" />--}}
            <span class="lbl"></span>
            {{--{!! Form::text('colour',null, ['class' => 'col-xs-10 col-sm-5', 'id' =>'colour', 'placeholder' => 'click here toselect colour, dont type']) !!}--}}
            {{--<i class="ace-icon fa fa-asterisk bigger-110 red"></i>--}}
        </div>
    </div>
</div>

