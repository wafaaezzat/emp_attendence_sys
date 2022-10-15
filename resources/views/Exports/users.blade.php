<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Role</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Last Seen</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name}}</td>
            <td>{{ $user->role->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->address }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
