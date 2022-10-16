@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Exports')

@section('content')
    <!-- /.col -->
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-3 col-md-3 ">
                <!-- small box -->
                <div class="small-box bg-secondary p-4 m-2">
                    <div class="inner">
                        <a href="{{ route('usersInfo.export') }}"  style="text-decoration: none;color: #1a174d;font-size: 25px">Export Users Information</a>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa-sharp fa-solid fa-cloud-arrow-down"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 ">
                <!-- small box -->
                <div class="small-box bg-secondary p-4 m-2">
                    <div class="inner">
                        <a href="{{ route('allAttendances.export') }}"style="text-decoration: none;color: #1a174d;font-size: 25px">Export Users Attendances</a>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa-sharp fa-solid fa-cloud-arrow-down"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 ">
                <!-- small box -->
                <div class="small-box bg-secondary p-4 m-2">
                    <div class="inner">
                        <a href="{{ route('adminAttendance.export') }}"style="text-decoration: none;color: #1a174d;font-size: 25px">Export Your Attendances</a>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa-sharp fa-solid fa-cloud-arrow-down"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 ">
                <!-- small box -->
                <div class="small-box bg-secondary p-4 m-2">
                    <div class="inner">
                        <a href="{{route('project.export')}}"style="text-decoration: none;color: #1a174d;font-size: 25px">Export Projects Information</a>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa-sharp fa-solid fa-cloud-arrow-down"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 ">
                <!-- small box -->
                <div class="small-box bg-secondary p-4 m-2">
                    <div class="inner">
                        <a href="{{ route('projects.attendance.export') }}"style="text-decoration: none;color: #1a174d;font-size: 25px">Export Projects Attendances</a>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa-sharp fa-solid fa-cloud-arrow-down"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 ">
                <!-- small box -->
                <div class="small-box bg-secondary p-4 m-2">
                    <div class="inner">
                        <a href="{{ route('UserAttendanceBerDayExport.export') }}"style="text-decoration: none;color: #1a174d;font-size: 25px">Export Users Attendances ber day</a>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa-sharp fa-solid fa-cloud-arrow-down"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 ">
                <!-- small box -->
                <div class="small-box bg-secondary p-4 m-2">
                    <div class="inner">
                        <a href="{{ route('MyAttendanceBerDayExport.export') }}"style="text-decoration: none;color: #1a174d;font-size: 25px">Export Your Attendances ber day</a>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa-sharp fa-solid fa-cloud-arrow-down"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
