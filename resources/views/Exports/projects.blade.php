<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Project Name</th>
        <th>Client Name</th>
        <th>Project Country</th>
        <th>Status</th>
        <th>Start Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($projects as $project)
        <tr>
            <td>{{$project->id}}</td>
            <td>{{$project->project_name}}</td>
            <td>{{$project->client_name}}</td>
            <td>{{$project->project_country}}</td>
            <td>{{$project->status}}</td>
            <td>{{$project->created_at->format('d/m/Y')}}</td>
        </tr>
    @endforeach



    </tbody>
</table>
