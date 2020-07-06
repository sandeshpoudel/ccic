<table class="table table-striped table-bordered">
    <tr>
        <td class="col-xs-4 col-sm-3">Renewal for this member is now paid till</td>
        <td class="col-xs-4 col-sm-3">
            <div class="form-group {{ $errors->has('renewalfailedsince') ? ' has-error' : '' }}">

                <div class="col-sm-12">
                    {!! Form::select('renewalfailedsince', $fiscals, $fiscalsinbetween->first()->id, [null, 'class' => 'col-xs-10 col-sm-10']) !!}


                </div>

            </div>
        </td>
        <td  align="right" class="col-xs-3 col-sm-3">
            Discount
        </td>
        <td>
            <div class="form-group {{ $errors->has('discount') ? ' has-error' : '' }}">

                <div class="col-sm-12">
                    {!! Form::text('discount',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}

                </div>

            </div>
        </td>
    </tr>

    <tr>
        <td>New Membership Status</td>
        <td><div class="form-group {{ $errors->has('statuses') ? ' has-error' : '' }}">

                <div class="col-sm-12">
                    {!! Form::select('statuses', $statuses, 4, ['placeholder' => 'Select One', 'class' => 'col-xs-10 col-sm-10']) !!}


                </div>

            </div></td>
        <td  align="right" class="col-xs-3 col-sm-3">
            Paid Amount
            </td>
        <td>
            <div class="form-group {{ $errors->has('paidamount') ? ' has-error' : '' }}">

                <div class="col-sm-9">
                    @if($member->nationality == "NP")
                        {!! Form::text('paidamount',$totalfee + (($finerate / 100) *  $fee->renew), ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
{{--                        {!! Form::text('paidamount',collect($invoiceRequest->invoiceitem['amount'])->sum() + (($finerate / 100) *  $fee->renew), ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}--}}
                    @else
                        {!! Form::text('paidamount',($totalfee + (($finerate / 100) *  $fee->renew)) *2, ['class' => 'col-xs-11 col-sm-11', 'id'=>'form-field-icon-2']) !!}
                    @endif
                    <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                </div>

            </div>
        </td>
    </tr>



    <tr>
        <td  align="right" colspan="3">Payment Method</td>
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
        <td  align="right" colspan="3">Reference</td>
        <td>
            <div class="form-group {{ $errors->has('reference') ? ' has-error' : '' }}">

                <div class="col-sm-9">
                    {!! Form::text('reference',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}

                </div>

            </div>

        </td>
    </tr>
    <tr>
        <td  align="right" colspan="3">Invoice Status</td>
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
        <td colspan="4">Remarks</td>

    </tr>
    <tr>
        <td colspan="4"><div class="col-sm-9">
                {!! Form::textarea('remarks',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}

            </div></td>
    </tr>

</table>