<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Attendance ID</th>
        <th>User ID</th>
        <th>User Name</th>
        <th>Date</th>
        <th>First Login</th>
        <th>Last Logout</th>
        <th>Total Hours</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        @foreach($user->attendancesBerDays as $attendance)
            <tr data-widget="expandable-table" aria-expanded="false">
                <td>{{$attendance->id}}</td>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$attendance->date}}</td>
                <td>{{$attendance->sign_in}}</td>
                <td>{{$attendance->lastlogoutTime}}</td>
                <td>{{floor($attendance->lastlogout-$attendance->firstlogin)}}</td>
            </tr>
        @endforeach
    @endforeach
    </tbody>
</table>
