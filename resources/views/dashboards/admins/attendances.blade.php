@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Attendance')

@section('content')
    <!-- ./card-header -->
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>First SignIN</th>
                <th>Last SignOut</th>
                <th>Total Hours</th>

            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                @foreach($user->attendancesBerDay as $attendance)
{{--                    @dd($attendance)--}}
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
