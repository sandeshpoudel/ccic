<table>
    <thead>
    <tr>
        <th>Membership No</th>
        <th>Business Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($members as $member)
        <tr>
            <td>{{ $member->id }}</td>
            <td>{{ $member->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>