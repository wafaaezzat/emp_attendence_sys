<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Attendance ID</th>
        <th>Projects</th>
        <th>Date</th>
        <th>SignIn</th>
        <th>SignOut</th>
        <th>Total Hours</th>
    </tr>
    </thead>
    <tbody>
        @foreach($user->attendancesBerDays as $attendance)
            <tr data-widget="expandable-table" aria-expanded="false">
                <td>{{$attendance->id}}</td>
                <td>
                    <ul>
                        @foreach($attendance->projects as $project)
                            {{$project->project_name}}
                        @endforeach
                    </ul>
                </td>
                <td>{{$attendance->created_at->format('d/m/Y')}}</td>
                <td>{{$attendance->sign_in}}</td>
                <td>{{$attendance->lastlogoutTime}}</td>
                <td>{{floor($attendance->lastlogout-$attendance->firstlogin)}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
