@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Attendance')

@section('content')
    <!-- ./card-header -->
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Date</th>
                <th>Status</th>
                <th>Login</th>
                <th>Logout</th>
                <th>Total Hours</th>
            </tr>
            </thead>
            <tbody>
            @foreach($attendances as $attendance)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{$attendance->id}}</td>
                    <td>{{$attendance->date}}</td>
                    <td>{{$attendance->login}}</td>
                    <td>{{$attendance->logout}}</td>
                    <td>{{$attendance->status}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection
