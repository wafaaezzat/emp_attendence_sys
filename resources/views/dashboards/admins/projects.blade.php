@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Projects')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            <strong>Success !</strong> {{ session('success') }}
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            <strong>Error !</strong> {{ session('error') }}
        </div>
    @endif

    <div class="card-body">
        <div class="tab-content">
            <div class="active tab-pane" id="personal_info">
                <form class="form-horizontal" method="GET" action="{{ route('add.project') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="project_name" class="col-sm-2 col-form-label">Project Name</label>
                        <div class="col-sm-4">
                            <input type="text"  id="project_name"  placeholder="Project Name" class="form-control @error('project_name') is-invalid @enderror" name="project_name">
                           @error('project_name')
                            <span class="text-danger error-text">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="client_id" class="col-sm-2 col-form-label">Clients</label>
                        <div class="col-sm-4">
                        <select class="form-control"  name="client_id" id="client_id">
                            <option value="option_select" disabled selected>clients</option>
                            @foreach($clients as $client)
                                <option value="{{$client->id}}">
                                    {{$client->name}}
                                </option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="project_country" class="col-sm-2 col-form-label">Project Country</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="project_country" id="project_country">
                                <option value="EGY">EGY</option>
                                <option value="KSA">KSA</option>
                                <option value="USA">USA</option>
                                <option value="UK">UK</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Add Project</button>
                        </div>
                    </div>
                </form>
            </div>
    <!-- ./card-header -->
    <div class="card-body">
        <div>
            <a href="{{route('project.export')}}" class="btn btn-block btn-success btn-sm" style="width:100px">Export Excel Sheet</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Project Name</th>
                <th>Client Name</th>
                <th>Project Country</th>
                <th>Status</th>
                <th>Start Date</th>
                <th>##</th>
                <th>##</th>
            </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{$project->id}}</td>
                        <td>{{$project->project_name}}</td>
                        <td>{{$project->client->name}}</td>
                        <td>{{$project->project_country}}</td>
                        <td>{{$project->status}}</td>
                        <td>{{$project->created_at->format('d/m/Y')}}</td>
                        <td>
                            <a href="{{ route('edit.project',$project->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('destroy.project', $project->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

@endsection
