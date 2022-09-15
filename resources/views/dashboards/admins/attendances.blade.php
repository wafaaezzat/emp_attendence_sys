@if ( Auth::user()->role_id ==1)
    <?php
        dd(Auth::user()->role_id);
        ?>
    @extends('dashboards.admins.layouts.admin-dash-layout')
@else
    @extends('dashboards.users.layouts.user-dash-layout')
@endif

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
            @foreach($attendances as $attendance)
            <tr data-widget="expandable-table" aria-expanded="false">
                <td>{{$attendance->id}}</td>
                <td>{{$attendance->created_at->diffForHumans()}}</td>
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
