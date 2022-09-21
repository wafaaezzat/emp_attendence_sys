@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','edit project')

@section('content')

    <div class="card-body">
        <div class="tab-content">
            <div class="active tab-pane" id="personal_info">
                <form class="form-horizontal" method="POST" action="{{ route('update.project', $project->id) }}">
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
                        <label for="client_name" class="col-sm-2 col-form-label">Client Name</label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="Client Name"  class="form-control @error('client_name') is-invalid @enderror" name="client_name">
                            @error('client_name')
                            <span class="text-danger error-text">{{$message}}</span>
                            @enderror
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
                            <button type="submit" class="btn btn-danger">Update Project</button>
                        </div>
                    </div>
                </form>
            </div>

@endsection
