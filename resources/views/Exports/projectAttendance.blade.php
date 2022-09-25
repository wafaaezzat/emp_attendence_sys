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
                    @foreach($project->attendances as $attendance)
                        <li>
                            {{$attendance->user->name}} , {{$attendance->created_at}}
                        </li>
                    @endforeach
                </ul>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
