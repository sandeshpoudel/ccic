


<table id="simple-table" class="table  table-bordered table-hover">
    <thead>
    <tr>
        <th class="center">
            No.
        </th>
        <th>Heading</th>
        <th>Amount</th>
        <th>Issue Date</th>
        <th >Received Date</th>
        <th >Status</th>
        <th >Action</th>



    </tr>
    </thead>
    <tbody>
    {!! Form::open(['url' => 'staff/receivables', 'class' => 'form-horizontal']) !!}
    <tr>
        <td></td>
        <td>
            {{--input for name--}}
            <div class="form-group {{ $errors->receivables->has('heading') ? ' has-error' : '' }}">

                <div class="col-sm-9">
                    {!! Form::text('heading',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                    <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                </div>
            </div>
        </td>
        <td>
            {{--input for position--}}
            <div class="form-group {{ $errors->receivables->has('amount') ? ' has-error' : '' }}">

                <div class="col-sm-9">
                    {!! Form::text('amount',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                    <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                </div>
            </div>



        </td>
        <td>
            {{--input for phone--}}
            <div class="form-group {{ $errors->receivables->has('issueddate') ? ' has-error' : '' }}">

                <div class="col-sm-9">
                    {!! Form::text('issuedate',null, ['class' => 'col-xs-10 col-sm-10 nepali-calendar', 'id'=>'receivable_issuedate']) !!}
                    <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                </div>
            </div>



        </td>
        <td>
            {{--input for email--}}
            <div class="form-group {{ $errors->receivables->has('receiveddate') ? ' has-error' : '' }}">

                <div class="col-sm-9">
                    {!! Form::text('receiveddate',null, ['class' => 'col-xs-10 col-sm-10 nepali-calendar', 'id'=>'receivable_receiveddate']) !!}
                </div>
            </div>
        </td>

        <td>
            {{--input for email--}}
            <div class="form-group {{ $errors->receivables->has('status') ? ' has-error' : '' }}">

                <div class="col-sm-9">
                    {!! Form::text('status',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                </div>
            </div>
        </td>


        <td>
            {!! Form::hidden('member_id',$member->id, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
            {!! Form::button('<i class="ace-icon fa fa-floppy-o bigger-160"> </i> Add new',  ['class' => 'btn btn-success', 'type' => 'submit']) !!}
        </td>

    </tr>
    {!! Form::close() !!}
    @if($member->receivable->count())
        @foreach($member->receivable as $receivable )
            <tr>
                <td>
                    {{ $receivable->id }}
                </td>
                <td>

                    {!! $receivable->heading !!}

                </td>
                <td>
                    {{ $receivable->amount }}
                </td>
                <td>{{ $receivable->issueddate }}</td>
                <td>
                    {{ $receivable->receiveddate }}
                </td>

                <td>
                    {{ $receivable->status }}
                </td>

                <td>
                    <a href="/staff/receivables/{{ $receivable->id }}/edit" class="btn btn-xs btn-warning">
                        <i class="ace-icon fa fa-pencil align-top bigger-125"></i> Update
                    </a>
                </td>
            </tr>

        @endforeach
    @endif
    </tbody>
</table>



