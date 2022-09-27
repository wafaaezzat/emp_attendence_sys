<table>
    <thead>
    <tr>
        <th>Project Name</th>
        <th>Attendees</th>
    </tr>
    </thead>
    <tbody>
    @foreach($projects as $project)
        <tr>
            <td>
                {{$project->project_name}}
            </td>
            <td>
                <ul>
                        @foreach($project->UserProjectAttendances as $attendance)
                            <li>
                                {{$users->find($attendance->user_id)->name}} , {{floor($attendance->sum)}} Hours
                            </li>
                        @endforeach
                </ul>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
