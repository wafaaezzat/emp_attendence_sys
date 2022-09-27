@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','My Attendance')

@section('content')

    <div class="card-body">
    <div class="col-md-12">
    <form class="offset-3" method="GET" action="{{ route('admin.filter') }}">
        <div class="form-row ">
            <div class="form-group col-md-4">
                <label for="start_date" class="visually-hidden">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ request()->start_date }}" placeholder="Start Date">
            </div>
            <div class="form-group col-md-4">
                <label for="end_date" class="visually-hidden">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ request()->end_date }}" placeholder="End Date">
            </div>
        <div class="offset-4">
            <button type="submit" class="btn btn-primary mb-4" >Submit</button>
        </div>
        </div>
    </form>
    </div>
    </div>
    <!-- ./card-header -->
    <div class="card-body">
        <div>
            <a href="{{ route('adminAttendance.export') }}" class="btn btn-block btn-success btn-sm" style="width:120px">Export Excel Sheet</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project</th>
                    <th>Date</th>
                    <th>Sign In</th>
                    <th>Sign Out</th>
                    <th>Total Hours</th>

                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <?php
                    $attendances = $start && $end != null ? ($user->attendances->whereBetween('created_at',[$start,$end])) : $user->attendances;
                    ?>
                @foreach($attendances as $attendance)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{$attendance->id}}</td>
                        <td>
                            @foreach($attendance->projects as $project)
                                    {{$project->project_name}}
                            @endforeach
                        </td>
                        <td>{{$attendance->created_at->format('d/m/Y')}}</td>
                        <td>{{$attendance->sign_in}}</td>
                        <td>{{$attendance->sign_out}}</td>
                        <td>{{floor($attendance->total_hours)}}</td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection


