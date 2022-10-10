<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>User ID</th>
        <th>User Name</th>
        <th>Projects</th>
        <th>Punch In</th>
        <th>Punch Out</th>
        <th>Date</th>
        <th>Total Hours</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        @foreach($user->userAttendanceBerDays as $attendance)
            <tr>
                <td>{{$attendance->id}}</td>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>
                    @foreach($attendance->projects as $project)
                        {{$project->project_name}}
                    @endforeach
                </td>
                <td><{{$attendance->sign_in}}</td>
                <td>{{$attendance->lastlogoutTime}}</td>
                <td>{{$attendance->created_at->format('d/m/Y')}}</td>
                <td>{{(int)$attendance->lastlogoutTime-(int)$attendance->firstlogin}}</td>
                <td>{{$attendance->type}}</td>
            </tr>
        @endforeach
    @endforeach
    </tbody>
</table>
