@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Settings')

@section('content')

    <!-- ./card-header -->
    <div class="card-body">
        <div>
            <a href="{{ route('projects.attendance.export') }}" class="btn btn-block btn-success btn-sm" style="width:120px">Export Excel Sheet</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Project Name</th>
                <th>Attendees  &&  Total Hours</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{$project->project_name}}
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
    </div>
    <!-- /.card-body -->
@endsection
