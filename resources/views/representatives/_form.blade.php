<div class="form-group {{ $errors->has('event') ? ' has-error' : '' }}">
    {{ Form::label('event', 'Event:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">



            {!! Form::select('event_id', $events, 4, ['placeholder' => 'Select One', 'class' => 'chosen-select']) !!}
            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>


    </div>
</div>

{{--input for position--}}
<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    {{ Form::label('name', 'Name:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::text('name',$member->proprietorName != "" ? $member->proprietorName : "", ['class' => 'col-xs-10 col-sm-5', 'id'=>'form-field-icon-2']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>
</div>

{{--input for position--}}
<div class="form-group {{ $errors->has('nepali') ? ' has-error' : '' }}">
    {{ Form::label('nepali', 'Name in Nepali:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::text('nepali',$member->nepalidetail != "" ? $member->nepalidetail->name : "", ['class' => 'col-xs-10 col-sm-5', 'id'=>'transliterateTextarea']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>
</div>

{{--input for phone--}}
<div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
    {{ Form::label('phone', 'Phone:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::text('phone', $member->proprietorMobile != "" ? $member->proprietorMobile : "", ['class' => 'col-xs-10 col-sm-5', 'id'=>'form-field-icon-2']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>
</div>

{{--input for email--}}
<div class="form-group {{ $errors->has('relation') ? ' has-error' : '' }}">
    {{ Form::label('relation', 'Relation to business:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::text('relation','Proprietor', ['class' => 'col-xs-10 col-sm-5', 'id'=>'form-field-icon-2']) !!}
        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    {{ Form::label('description', 'Description:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
    <div class="col-sm-9">
        {!! Form::textarea('description',null, ['class' => 'col-xs-10 col-sm-5', 'id'=>'form-field-icon-2']) !!}

    </div>
</div>

<div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">



        {!! Form::button('<i class="ace-icon fa fa-floppy-o bigger-160"> </i> Submit',  ['class' => 'btn btn-success', 'type' => 'submit']) !!}
        &nbsp; &nbsp; &nbsp;

    </div>
</div>