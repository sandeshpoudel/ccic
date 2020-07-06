


        <table id="simple-table" class="table  table-bordered table-hover">
            <thead>
            <tr>
                <th class="center">
                    No.
                </th>
                <th>Name</th>
                <th>Position</th>
                <th>Phone</th>
                <th >Email</th>
                <th >Actions</th>



            </tr>
            </thead>
            <tbody>
            {!! Form::open(['url' => 'staff/membercontacts', 'class' => 'form-horizontal']) !!}
            <tr>
                <td></td>
                <td>
                    {{--input for name--}}
                    <div class="form-group {{ $errors->membercontacts->has('name') ? ' has-error' : '' }}">

                        <div class="col-sm-9">
                            {!! Form::text('name',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                        </div>
                    </div>
                </td>
                <td>
                    {{--input for position--}}
                    <div class="form-group {{ $errors->membercontacts->has('position') ? ' has-error' : '' }}">

                        <div class="col-sm-9">
                            {!! Form::text('position',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                        </div>
                    </div>



                </td>
                <td>
                    {{--input for phone--}}
                    <div class="form-group {{ $errors->membercontacts->has('phone') ? ' has-error' : '' }}">

                        <div class="col-sm-9">
                            {!! Form::text('phone',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                            <i class="ace-icon fa fa-asterisk bigger-110 red"></i>
                        </div>
                    </div>

                </td>
                <td>
                    {{--input for email--}}
                    <div class="form-group {{ $errors->membercontacts->has('email') ? ' has-error' : '' }}">

                        <div class="col-sm-9">
                            {!! Form::text('email',null, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                        </div>
                    </div>
                </td>
                <td>
                    {!! Form::hidden('member_id',$member->id, ['class' => 'col-xs-10 col-sm-10', 'id'=>'form-field-icon-2']) !!}
                    {!! Form::button('<i class="ace-icon fa fa-floppy-o bigger-160"> </i> Add new',  ['class' => 'btn btn-success', 'type' => 'submit']) !!}
                </td>

            </tr>
            {!! Form::close() !!}
            @if($member->membercontact->count())
                @foreach($member->membercontact as $contact )
                    <tr>
                        <td>
                            {{ $contact->id }}
                        </td>
                        <td>

                            {!! $contact->name !!}

                        </td>
                        <td>{{ $contact->position }}</td>
                        <td>
                            {{ $contact->phone }}
                        </td>
                        <td>
                            {{ $contact->email }}
                        </td>

                        <td>
                            <a href="/staff/membercontacts/{{ $contact->id }}/edit" class="btn btn-xs btn-warning">
                                <i class="ace-icon fa fa-pencil align-top bigger-125"></i> Update
                            </a>
                        </td>
                    </tr>

                @endforeach



            @endif
            </tbody>
        </table>



