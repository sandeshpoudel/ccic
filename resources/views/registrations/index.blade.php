<table id="simple-table" class="table  table-bordered table-hover">
    <thead>
    <tr>

        <th>Registration Authority</th>
        <th>Registration No.</th>
        <th>Registration Date</th>
        <th >Actions</th>
    </tr>
    </thead>
    <tbody>
    {!! Form::open(['url' => 'staff/registrations', 'class' => 'form-horizontal']) !!}
    <tr>

        <td>
            {{--input for authority--}}
            <div class="form-group {{ $errors->registrations->has('authority') ? ' has-error' : '' }}">


                    {!! Form::select('authority', [
                    'Municipality Registration'=>'Municipality Registration',
                    'Inland Revenue Department'=>'Inland Revenue Department',
                    'Department of Small Cottage and Industries'=>'Department of Small Cottage and Industries',
                    'Office of Company Registrar'=>'Office of Company Registrar',
                    'Department of Drug Administration'=>'Department of Drug Administration',
                    'District Livestock Services Office'=>'District Livestock Services Office',
                    'District Agriculture Development Office'=>'District Agriculture Development Office',
                    'Cooperative Training and Division Office'=>'Cooperative Training and Division Office',
                    'The Institute of Chartered Accountants of Nepal'=>'The Institute of Chartered Accountants of Nepal',
                    ], null, ['placeholder' => 'Select One', 'class' => 'chosen-select']) !!}
                    <i class="ace-icon fa fa-asterisk bigger-110 red"></i>

            </div>
        </td>
        <td>
            {{--input for number--}}
            <div class="form-group {{ $errors->registrations->has('number') ? ' has-error' : '' }}">

                <div class="col-sm-9">
                    {!! Form::text('number',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                    <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                </div>
            </div>
        </td>
        <td>
            {{--input for date--}}
            <div class="form-group {{ $errors->registrations->has('date') ? ' has-error' : '' }}">

                <div class="col-sm-9">
                    {!! Form::text('date',null, ['class' => 'nepali-calendar', 'id'=>'registration_nepalidate']) !!}
                    <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                </div>
            </div>

        </td>

        <td>
            {!! Form::hidden('member_id',$member->id, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
            {!! Form::button('<i class="ace-icon fa fa-floppy-o bigger-160"> </i> Add new',  ['class' => 'btn btn-success', 'type' => 'submit']) !!}
        </td>

    </tr>
    {!! Form::close() !!}
    @if($member->registration->count())
        @foreach($member->registration as $registration )
            <tr>

                <td>

                    {!! $registration->authority !!}

                </td>
                <td>{{ $registration->number }}</td>
                <td>
                    {{ $registration->date }}
                </td>
                <td>
                    <a href="/staff/registrations/{{ $registration->id }}/edit" class="btn btn-xs btn-warning">
                        <i class="ace-icon fa fa-pencil align-top bigger-125"></i> Update
                    </a>
                </td>
            </tr>

        @endforeach
    @endif
    </tbody>
</table>



