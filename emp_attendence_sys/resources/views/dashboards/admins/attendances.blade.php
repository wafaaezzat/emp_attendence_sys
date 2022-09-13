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
                <th>Login</th>
                <th>Logout</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($adminAttendances as $adminAttendance)
            <tr data-widget="expandable-table" aria-expanded="false">
{{--                <?php--}}
{{--               dd(     $adminAttendance);--}}
{{--                    ?>--}}
                <td>{{$adminAttendance->id}}</td>
                <td>{{$adminAttendance->created_at}}</td>
                <td>{{$adminAttendance->sign_in}}</td>
                <td>{{$adminAttendance->sign_out}}</td>
                <td>{{$adminAttendance->status}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection
