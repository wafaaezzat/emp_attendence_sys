@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Attendance')

@section('content')
    <!-- ./card-header -->
    <div class="card-body">
        <div>
            <a href="{{ route('userAttendance.export') }}" class="btn btn-block btn-success btn-sm" style="width:120px">Export Excel Sheet</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>SignIn</th>
                <th>SignOut</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                @foreach($user->attendancesBerDay as $attendance)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{$attendance->id}}</td>
                        <td>{{$attendance->created_at->format('d/m/Y')}}</td>
                        <td>{{$attendance->sign_in}}</td>
                        <td>{{$attendance->lastlogoutTime}}</td>
                        <td>{{floor($attendance->lastlogout-$attendance->firstlogin)}}</td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection
