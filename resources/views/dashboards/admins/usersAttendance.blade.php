@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Attendance')

@section('content')
    <!-- ./card-header -->
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>User ID</th>
                <th>Date</th>
                <th>Login</th>
                <th>Logout</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($attendances as $attendance)
            <tr data-widget="expandable-table" aria-expanded="false">
                <td>{{$attendance->id}}</td>
                <td>{{$attendance->user_id}}</td>
                <td>{{$attendance->created_at}}</td>
                <td>{{$attendance->sign_in}}</td>
                <td>{{$attendance->sign_out}}</td>
                @if($attendance->status==1)
                <td>Present</td>
                @elseif($attendance->status==2)
                    <td>Absent</td>
                @endif
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection
