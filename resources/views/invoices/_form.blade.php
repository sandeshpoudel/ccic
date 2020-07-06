<div class="row">
    <div class="col-sm-6">
        <div class="row">
            <div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
                <b>Company Info</b>
            </div>
        </div>

        <div>
            <ul class="list-unstyled spaced">
                <li>
                    <i class="ace-icon fa fa-caret-right blue"></i>{{ $member->name }}
                </li>

                <li>
                    <i class="ace-icon fa fa-caret-right blue"></i>{{ $member->location->title }}
                </li>

                <li>
                    <i class="ace-icon fa fa-caret-right blue"></i>{{ $member->chowk }}
                </li>

                <li>
                    <i class="ace-icon fa fa-caret-right blue"></i>
                    Phone:
                    <b class="red">{{ $member->phone }}</b>
                </li>

                <li>
                    <i class="ace-icon fa fa-caret-right blue"></i>
                    Membership Number: {{ $member->id }}






                </li>


            </ul>
        </div>
    </div><!-- /.col -->

    <div class="col-sm-6">
        <div class="row">
            <div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
                <b>Customer Info</b>
            </div>
        </div>

        <div>
            <ul class="list-unstyled  spaced">


                <li> {!! Form::hidden('member_id',$member->id) !!}
                    <div class="form-group {{ $errors->has('paymentby') ? ' has-error' : '' }}">
                        {{ Form::label('paymentby', 'Received By:', ['class' => 'col-sm-3 control-label']) }}
                        <div class="col-sm-9">
                            {!! Form::text('paymentby',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                        </div>

                    </div>
                </li>

                <li>

                    <div class="form-group {{ $errors->has('duedate') ? ' has-error' : '' }}">
                        {{ Form::label('duedate', 'Due Date:', ['class' => 'col-sm-3 control-label no-padding-right']) }}

                        <div class="col-sm-9">
                            {!! Form::text('duedate','2018-12-01', ['class' => 'nepali-calendar']) !!}
                            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
                        {{ Form::label('date', 'Billing Date:', ['class' => 'col-sm-3 control-label no-padding-right']) }}
                        <div class="col-sm-9">

                            {!! Form::text('date',null, ['class' => 'nepali-calendar', 'id'=>'nepaliDateFrom']) !!}
                            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                        </div>
                    </div>
                </li>


            </ul>
        </div>
    </div><!-- /.col -->
</div>
<div class="space"></div>
<div>
    <table class="table table-striped table-bordered" id="tableSocProducts">
        <thead>
        <tr>

            <th>Heading</th>
            <th>For Fiscal Year</th>
            <th>Due on</th>
            <th class="hidden-xs">Description</th>
            <th>Total</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>

            {{-- item--}}
            <td>
                <div class="form-group {{ $errors->has('imvoiceable_id') ? ' has-error' : '' }}">

                    <div class="col-xs-12">
                        {!! Form::select('invoiceitem[invoiceable_id][]', $invoiceables, null, ['placeholder' => 'Select One', 'class' => 'chosen-selects']) !!}
                        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                    </div>

                </div>
            </td>
            {{-- for fiscal year--}}
            <td>
                <div class="form-group {{ $errors->has('fiscal_id') ? ' has-error' : '' }}">


                    <div class="col-xs-12">
                        {!! Form::select('invoiceitem[fiscal_id][]', $fiscals, $current_fiscal->id, ['class' => 'chosen-selects']) !!}
                        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                    </div>

                </div>
            </td>
            {{-- item due on--}}
            <td>
                <div class="form-group {{ $errors->has('itemdue') ? ' has-error' : '' }}">
                    <div class="col-sm-12">
                        {!! Form::text('invoiceitem[itemdue][]','2018-12-01', ['class' => 'col-xs-11 col-sm-11 date-picker']) !!}
                        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                    </div>

                </div>
            </td>
            {{-- description--}}
            <td class="hidden-xs">
                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">

                    <div class="col-sm-12">
                        {!! Form::textarea('invoiceitem[description][]',null, ['class' => 'col-xs-11 col-sm-11', 'id'=>'form-field-icon-2', 'rows' => '2']) !!}
                        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                    </div>

                </div>
            </td>
            {{-- amount--}}
            <td>
                <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">

                    <div class="col-sm-12">
                        {!! Form::text('invoiceitem[amount][]',null, ['class' => 'col-xs-11 col-sm-11', 'id'=>'form-field-icon-2']) !!}
                        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>

                    </div>

                </div></td>
            <td>



                <button id="addNewItem" name="addNewItem" type="button" class="btn btn-xs btn-success add"><i class="fa fa-plus-circle"></i></button>
                <button id="removeItem" name="removeItem" type="button" class="btn btn-xs btn-danger remove"><i class="fa fa-times "></i></button>

            </td>
        </tr>


        </tbody>
    </table>


    <table class="table table-striped table-bordered">
        <tr>
            <td  align="right" class="col-xs-9 col-sm-9">
                Discount</td>
            <td>
                <div class="form-group {{ $errors->has('discount') ? ' has-error' : '' }}">

                    <div class="col-sm-9">
                        {!! Form::text('discount',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}

                    </div>

                </div>
            </td>
        </tr>

        <tr>
            <td align="right">Paid Amount</td>
            <td>
                <div class="form-group {{ $errors->has('paidamount') ? ' has-error' : '' }}">

                    <div class="col-sm-9">
                        {!! Form::text('paidamount',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                    </div>

                </div>

            </td>
        </tr>

        <tr>
            <td  align="right">Payment Method</td>
            <td>
                <div class="form-group {{ $errors->has('method') ? ' has-error' : '' }}">

                    <div class="col-sm-9">
                        {!! Form::text('method','cash', ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                    </div>

                </div>

            </td>
        </tr>
        <tr>
            <td  align="right">Reference</td>
            <td>
                <div class="form-group {{ $errors->has('reference') ? ' has-error' : '' }}">

                    <div class="col-sm-9">
                        {!! Form::text('reference',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}

                    </div>

                </div>

            </td>
        </tr>
        <tr>
            <td  align="right">Invoice Status</td>
            <td>
                <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">

                    <div class="col-sm-9">
                        {!! Form::text('status','paid', ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                        <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                    </div>

                </div>

            </td>
        </tr>
        <tr >
            <td colspan="2">Remarks</td>

        </tr>
        <tr>
            <td colspan="2"><div class="col-sm-9">
                    {!! Form::textarea('remarks',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}

                </div></td>
        </tr>

    </table>
</div>