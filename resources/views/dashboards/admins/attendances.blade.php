@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','My Attendance')

@section('content')

    <div class="card-body">
    <div class="col-md-12">
    <form class="offset-3" method="GET" action="{{ route('admin.filter') }}">
        <div class="form-row ">
        <div class="form-group col-md-4">
            <label for="start_date" class="visually-hidden">Start Date</label>
            <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
        </div>
        <div class="form-group col-md-4">
            <label for="end_date" class="visually-hidden">End Date</label>
            <input type="text" class="form-control" id="end_date" name="end_date" placeholder="End Date">
        </div>
        </div>
        <div class="offset-3">
            <button type="submit" class="btn btn-primary mb-3" >Filter</button>
            <button type="submit" class="btn btn-primary mb-3" name="clear" >Clear</button>

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
                <th>#</th>
                <th>Date</th>
                <th>First SignIN</th>
                <th>Last SignOut</th>
                <th>Total Hours</th>

            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    @if(isset($start))
                        @foreach($user->attendancesBerDay->whereBetween(('date'),[ $start, $end]) as $attendance)
                             <tr data-widget="expandable-table" aria-expanded="false">
                                <td>{{$attendance->id}}</td>
                                <td>{{$attendance->created_at->format('d/m/Y')}}</td>
                                <td>{{$attendance->sign_in}}</td>
                                <td>{{$attendance->lastlogoutTime}}</td>
                                <td>{{floor($attendance->lastlogout-$attendance->firstlogin)}}</td>
                             </tr>
                        @endforeach
                    @else
                        @foreach($user->attendancesBerDay as $attendance)
                            <tr data-widget="expandable-table" aria-expanded="false">
                                <td>{{$attendance->id}}</td>
                                <td>{{$attendance->created_at->format('d/m/Y')}}</td>
                                <td>{{$attendance->sign_in}}</td>
                                <td>{{$attendance->lastlogoutTime}}</td>
                                <td>{{floor($attendance->lastlogout-$attendance->firstlogin)}}</td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection


