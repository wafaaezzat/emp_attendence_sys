@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Attendance')

@section('content')
    <!-- ./card-header -->
    <div class="card-body">
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
            @foreach($attendances as $attendance)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{$attendance->id}}</td>
                    <td>{{$attendance->created_at}}</td>
                    <td>{{$attendance->sign_in}}</td>
                    <td>{{$attendance->sign_out}}</td>
                    <td>{{$attendance->status}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection
