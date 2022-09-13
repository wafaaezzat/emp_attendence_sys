@extends('dashboards.admins.layouts.admin-dash-layout')
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
            </tr>
            </thead>
            <tbody>
            <tr data-widget="expandable-table" aria-expanded="false">
                <td>183</td>
                <td>John Doe</td>
                <td>11-7-2014</td>
                <td>Approved</td>
                <td>dateTime</td>
                <td>dateTime</td>
            </tr>

            <tr data-widget="expandable-table" aria-expanded="true">
                <td>219</td>
                <td>Alexander Pierce</td>
                <td>11-7-2014</td>
                <td>Pending</td>
                <td>dateTime</td>
                <td>dateTime</td>
            </tr>
            <tr data-widget="expandable-table" aria-expanded="true">
                <td>657</td>
                <td>Alexander Pierce</td>
                <td>11-7-2014</td>
                <td>Approved</td>
                <td>dateTime</td>
                <td>dateTime</td>
            </tr>
            <tr data-widget="expandable-table" aria-expanded="false">
                <td>175</td>
                <td>Mike Doe</td>
                <td>11-7-2014</td>
                <td>Denied</td>
                <td>dateTime</td>
                <td>dateTime</td>
            </tr>
            <tr data-widget="expandable-table" aria-expanded="false">
                <td>134</td>
                <td>Jim Doe</td>
                <td>11-7-2014</td>
                <td>Approved</td>
                <td>dateTime</td>
                <td>dateTime</td>
            </tr>
            <tr data-widget="expandable-table" aria-expanded="false">
                <td>494</td>
                <td>Victoria Doe</td>
                <td>11-7-2014</td>
                <td>Pending</td>
                <td>dateTime</td>
                <td>dateTime</td>
            </tr>
            <tr data-widget="expandable-table" aria-expanded="false">
                <td>832</td>
                <td>Michael Doe</td>
                <td>11-7-2014</td>
                <td>Approved</td>
                <td>dateTime</td>
                <td>dateTime</td>
            </tr>
            <tr data-widget="expandable-table" aria-expanded="false">
                <td>982</td>
                <td>Rocky Doe</td>
                <td>11-7-2014</td>
                <td>Denied</td>
                <td>dateTime</td>
                <td>dateTime</td>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

@endsection
