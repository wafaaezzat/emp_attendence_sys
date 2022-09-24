@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Settings')

@section('content')

    <!-- ./card-header -->
    <div class="card-body">
        <div>
            <a href="{{ route('adminAttendance.export') }}" class="btn btn-block btn-success btn-sm" style="width:120px">Export Excel Sheet</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Project Name</th>
                <th>Attendees  &&  Joined Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{$project->project_name}}
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
    </div>
    <!-- /.card-body -->
@endsection
