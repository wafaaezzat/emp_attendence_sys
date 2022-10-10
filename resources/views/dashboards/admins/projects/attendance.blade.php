@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Settings')

@section('content')

{{--    <!-- ./card-header -->--}}
{{--    <div class="card-body">--}}
{{--        <div>--}}
{{--            <a href="{{ route('projects.attendance.export') }}" class="btn btn-block btn-secondary btn-sm" style="width:120px">Export Excel Sheet</a>--}}
{{--        </div>--}}
{{--        <table class="table table-bordered table-hover">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Project Name</th>--}}
{{--                <th>Attendees  &&  Total Hours</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($projects as $project)--}}
{{--                <tr data-widget="expandable-table" aria-expanded="false">--}}
{{--                    <td>{{$project->project_name}}--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <ul>--}}
{{--                            @foreach($project->UserProjectAttendances as $attendance)--}}
{{--                                <li>--}}
{{--                                    {{$users->find($attendance->user_id)->name}} , {{floor($attendance->sum)}} Hours--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
{{--    <!-- /.card-body -->--}}


<div class="row ">
    <div class="col-md-6">
        <form method="GET" class="form-horizontal" action="{{ route('show.project') }}">
            @csrf
            <div class="card card-secondary card-outline text-center">
                <div class="card-body box-profile ">
                    <div class="text-center">
                        <div class="text-center">
                            <select class="form-select form-select-sm @error('project_id') is-invalid @enderror " name="project_id" id="project_id">
                            <option value="option_select" disabled selected>Projects</option>
                                @foreach($projects as $project)
                                    <option value="{{$project->id}}">
                                        {{$project->project_name}}
                                    </option>
                                 @endforeach
                            </select>
                            <div>
                                @error('project_id')
                                <span class="text-danger error-text">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-secondary mb-4 " style="width: 150px">Show</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="card card-secondary card-outline text-center" style="display: flex">
            <di class="card-title"><h4>Employees Involved</h4></di>
            @foreach($project->UserProjectAttendances as $attendance)
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">{{$users->find($attendance->user_id)->name}}</p>
                            <p class="card-text">{{\Carbon\CarbonInterval::seconds($attendance->sum*60*60)->cascade()->forHumans()}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
                <div>
                    <h2>Total Hours</h2>
                    <h3>{{\Carbon\CarbonInterval::seconds($sum*60*60)->cascade()->forHumans()}}</h3>
                </div>
        </div>
    </div >

    @if(isset($project,$chart))
    <div class="row">
        <div class="card card-secondary card-outline text-center">
            <h3>{{$project->project_name}}</h3>
            <div class="card-body box-profile">
                {!! $chart->container() !!}
                {!! $chart->script() !!}
            </div>
        </div>
    </div>
    @endif
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
@endsection
