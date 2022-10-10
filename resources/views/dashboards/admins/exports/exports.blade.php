@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Exports')

@section('content')
    <div class="row p-3 col-sm-4">
    </div>
    <div class="row p-3">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="p-3">
                            <a href="{{ route('allAttendances.export') }}" class="btn btn-block btn-secondary btn-sm" style="width:120px">Export Users Attendances</a>
                        </div>
                        <div class="p-3">
                            <a href="{{ route('adminAttendance.export') }}" class="btn btn-block btn-secondary btn-sm" style="width:120px">Export Your Attendances</a>
                        </div>

                        <div  class="p-3">
                            <a href="{{route('project.export')}}" class="btn btn-block btn-secondary btn-sm" style="width:100px">Export Projects</a>
                        </div>
                        <div class="p-3">
                            <a href="{{ route('projects.attendance.export') }}" class="btn btn-block btn-secondary btn-sm" style="width:120px">Export Project Attendance</a>
                        </div>
                        <div class="p-3">
                            <a href="{{ route('UserAttendanceBerDayExport.export') }}" class="btn btn-block btn-secondary btn-sm" style="width:120px">Export Attendances /day</a>
                        </div>
                        <div class="p-3">
                            <a href="{{ route('MyAttendanceBerDayExport.export') }}" class="btn btn-block btn-secondary btn-sm" style="width:120px">Export your Attendances /day</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>


@endsection
