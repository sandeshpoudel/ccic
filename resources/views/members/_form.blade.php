<div class="row">
    <div class="col-sm-6">
        <h3 class="header smaller lighter green">
            <i class="ace-icon fa fa-certificate"></i>
            Business Identity
        </h3>

        {{--input for name--}}
        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            {{ Form::label('name', 'Business Name:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('name',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

        {{--input for details--}}
        <div class="form-group {{ $errors->has('details') ? ' has-error' : '' }}">
            {{ Form::label('details', 'Details:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::textarea('details',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2', 'rows' => '5']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

        {{--input for category_id--}}
        <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
            {{ Form::label('category_id', 'Business Category:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::select('category_id', $categories, null, ['placeholder' => 'Select One', 'class' => 'chosen-select']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

        {{--input for capital--}}
        <div class="form-group {{ $errors->has('capital') ? ' has-error' : '' }}">
            {{ Form::label('capital', 'Capital:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('capital',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

        {{--input for membershiptype_id--}}
        <div class="form-group {{ $errors->has('membershiptype_id') ? ' has-error' : '' }}">
            {{ Form::label('membershiptype_id', 'Membership Type:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::select('membershiptype_id', $membershiptypes, null, ['placeholder' => 'Select One', 'class' => 'chosen-select']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

        {{--input for ownershiptype_id--}}
        <div class="form-group {{ $errors->has('ownershiptype_id') ? ' has-error' : '' }}">
            {{ Form::label('ownershiptype_id', 'Ownership Type:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::select('ownershiptype_id', $ownershiptypes, null, ['placeholder' => 'Select One', 'class' => 'chosen-select']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

        {{--input for nature--}}
        <div class="form-group {{ $errors->has('nature') ? ' has-error' : '' }}">
            {{ Form::label('nature', 'Nature:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                <div class="col-sm-6">
                    For Industry:: <br>
                    Production  {{ Form::radio('nature', 'production', ['class' => 'ace']) }}
                    Service  {{ Form::radio('nature', 'service', ['class' => 'ace']) }}
                </div>
                <div class="col-sm-6">
                    For Commerce:: <br>
                    Retail  {{ Form::radio('nature', 'retail', ['class' => 'ace']) }}
                    Wholesale  {{ Form::radio('nature', 'wholesale', ['class' => 'ace']) }}
                </div>

            </div>
        </div>



        {{--input for startDate--}}
        <div class="form-group {{ $errors->has('startDate') ? ' has-error' : '' }}">
            {{ Form::label('startDate', 'Start Date:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('nepalistartdate',null, ['class' => 'nepali-calendar', 'id'=>'nepaliDateFrom']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                {!! Form::text('startDate',null, [ 'id'=>'englishDateFrom']) !!}

            </div>
        </div>

        {{--input for location_id--}}
        <div class="form-group {{ $errors->has('location_id') ? ' has-error' : '' }}">
            {{ Form::label('location_id', 'VDC/Municipality:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::select('location_id', $locations, null, ['placeholder' => 'Select One', 'class' => 'chosen-select']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

        {{--input for ward--}}
        <div class="form-group {{ $errors->has('ward') ? ' has-error' : '' }}">
            {{ Form::label('ward', 'Ward no:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('ward',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

        {{--input for chowk--}}
        <div class="form-group {{ $errors->has('chowk') ? ' has-error' : '' }}">
            {{ Form::label('chowk', 'Chowk:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('chowk',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

        {{--input for tole--}}
        <div class="form-group {{ $errors->has('tole') ? ' has-error' : '' }}">
            {{ Form::label('tole', 'Tole:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('tole',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}

            </div>
        </div>

        {{--input for phone--}}
        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
            {{ Form::label('phone', 'Office Phone:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('phone',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

        {{--input for website--}}
        <div class="form-group {{ $errors->has('website') ? ' has-error' : '' }}">
            {{ Form::label('website', 'Website:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('website',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}

            </div>
        </div>

        {{--input for email--}}
        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            {{ Form::label('email', 'Email:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('email',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}

            </div>
        </div>

        {{--input for fax--}}
        <div class="form-group {{ $errors->has('fax') ? ' has-error' : '' }}">
            {{ Form::label('fax', 'Fax:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('fax',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}

            </div>
        </div>


    </div>

    <div class="col-sm-6">
        <h3 class="header smaller lighter green">
            Business Primary Contact
            <i class="ace-icon fa  fa-bookmark"></i>
        </h3>

        {{--input for proprietorName--}}
        <div class="form-group {{ $errors->has('proprietorName') ? ' has-error' : '' }}">
            {{ Form::label('proprietorName', 'Proprietors Name:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('proprietorName',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

        {{--input for proprietorPhone--}}
        <div class="form-group {{ $errors->has('proprietorPhone') ? ' has-error' : '' }}">
            {{ Form::label('proprietorPhone', 'Phone:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('proprietorPhone',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

        {{--input for proprietorMobile--}}
        <div class="form-group {{ $errors->has('proprietorMobile') ? ' has-error' : '' }}">
            {{ Form::label('proprietorMobile', 'Proprietors Mobile:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('proprietorMobile',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

        {{--input for gender--}}
        <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
            {{ Form::label('gender', 'Gender:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                <div class="col-sm-9 ">
                    {{ Form::radio('gender', 'male', ['class' => 'ace']) }} Male
                    {{ Form::radio('gender', 'female', ['class' => 'ace'] ) }} Female
                    {{ Form::radio('gender', 'others', ['class' => 'ace'] ) }} Others
                    {{--{{ Form::radio('status', 'disabled', true, ['class' => 'ace']) }}--}}
                    {{--<input name="switch-field-1" class="ace ace-switch ace-switch-4 btn-empty" type="checkbox" />--}}
                    <span class="lbl"></span>
                    {{--{!! Form::text('colour',null, ['class' => 'col-xs-10 col-sm-5', 'id' =>'colour', 'placeholder' => 'click here toselect colour, dont type']) !!}--}}
                    {{--<i class="ace-icon fa fa-asterisk bigger-110 red"></i>--}}
                </div>
            </div>
        </div>

        {{--input for nationality--}}
        <div class="form-group {{ $errors->has('nationality') ? ' has-error' : '' }}">
            {{ Form::label('nationality', 'Nationality:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::select('nationality', $nationality, null, ['class' => 'chosen-select']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>





        {{--input for citizenship--}}
        <div class="form-group {{ $errors->has('citizenship') ? ' has-error' : '' }}">
            {{ Form::label('citizenship', 'Citizenship No:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('citizenship',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

        {{--input for landlord--}}
        <div class="form-group {{ $errors->has('landlord') ? ' has-error' : '' }}">
            {{ Form::label('landlord', 'Landlords Name:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('landlord',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}

            </div>
        </div>

        {{--input for charkilla--}}
        <div class="form-group {{ $errors->has('charkilla') ? ' has-error' : '' }}">
            {{ Form::label('charkilla', 'Charkilla:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::textarea('charkilla',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2', 'rows' => '5']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

    </div>


    <div class="col-sm-6">
        <h3 class="header smaller lighter green">
            <i class="ace-icon fa  fa-info-circle"></i>
            Application Information
        </h3>


        {{--input for applicantName--}}
        <div class="form-group {{ $errors->has('applicantName') ? ' has-error' : '' }}">
            {{ Form::label('applicantName', 'Applicants Name:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('applicantName',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

        {{--input for applicantRelation--}}
        <div class="form-group {{ $errors->has('applicationRelation') ? ' has-error' : '' }}">
            {{ Form::label('applicationRelation', 'Relation to business:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('applicationRelation',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

        {{--input for location_id--}}
        <div class="form-group {{ $errors->has('membershipstatus_id') ? ' has-error' : '' }}">
            {{ Form::label('membershipstatus_id', 'Application Status:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::select('membershipstatus_id', $membershipstatuses, null, ['placeholder' => 'Select One', 'class' => 'chosen-select']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

        {{--input for location_id--}}
        <div class="form-group {{ $errors->has('renewalfailedsince') ? ' has-error' : '' }}">
            {{ Form::label('renewalfailedsince', 'Renewal Upto:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::select('renewalfailedsince', $renewalfailedsince, null, ['placeholder' => 'Select One', 'class' => 'chosen-select']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
            </div>
        </div>

        {{--input for applicationDate--}}

        <div class="form-group {{ $errors->has('applicationDateInBS') ? ' has-error' : '' }}">
            {{ Form::label('applicationDateInBS', 'Application Date:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('applicationDateInBS',null, ['class' => 'nepali-calendar', 'id'=>'applicationDateInBS']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                {!! Form::text('applicationDateInAD',null, [ 'id'=>'applicationDateInAD']) !!}

            </div>
        </div>

        <div class="form-group {{ $errors->has('applicationApprovalDateInBS') ? ' has-error' : '' }}">
            {{ Form::label('applicationApprovalDateInBS', 'Application Approval Date:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
            <div class="col-sm-9">
                {!! Form::text('applicationApprovalDateInBS',null, ['class' => 'nepali-calendar', 'id'=>'applicationApprovalDateInBS']) !!}
                <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                {!! Form::text('applicationApprovalDateInAD',null, [ 'id'=>'applicationApprovalDateInAD']) !!}

            </div>
        </div>

