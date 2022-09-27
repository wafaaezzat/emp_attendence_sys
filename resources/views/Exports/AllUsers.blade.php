<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Project</th>
        <th>User ID</th>
        <th>User Name</th>
        <th>Date</th>
        <th>Sign In</th>
        <th>Sign Out</th>
        <th>Total Hours</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        @foreach($user->attendances as $attendance)
            <tr data-widget="expandable-table" aria-expanded="false">
                <td>{{$attendance->id}}</td>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>
                    @foreach($attendance->projects as $project)
                        {{$project->project_name}}
                    @endforeach
                </td>
                <td>{{$attendance->created_at->format('d/m/Y')}}</td>
                <td>{{$attendance->sign_in}}</td>
                <td>{{$attendance->sign_out}}</td>
                <td>{{floor($attendance->total_hours)}}</td>
            </tr>
        @endforeach
    @endforeach
    </tbody>
</table>
