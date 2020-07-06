


<table id="simple-table" class="table  table-bordered table-hover">
    <thead>
    <tr>
        <th class="center">
            No.
        </th>
        <th>Name</th>
        <th>Event</th>
        <th>Phone</th>
        <th >Relation to Business</th>
        <th >Actions</th>



    </tr>
    </thead>
    <tbody>

    @if($member->representative->count())
        @foreach($member->representative as $representative )
            <tr>
                <td>
                    {{ $representative->id }}
                </td>
                <td>

                    {!! $representative->name !!}

                </td>
                <td>{{ $representative->event->title }}</td>
                <td>
                    {{ $representative->phone }}
                </td>
                <td>
                    {{ $representative->relation }}
                </td>

                <td>
                    <a href="/staff/representatives/{{ $representative->id }}/edit" class="btn btn-xs btn-warning">
                        <i class="ace-icon fa fa-pencil align-top bigger-125"></i> Update
                    </a>
                </td>
            </tr>

        @endforeach



    @endif
    </tbody>
</table>



