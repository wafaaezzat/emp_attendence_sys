@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Dashboard')

@section('content')

    <div class="card-body">
        <div class="col-md-12">
            <form method="GET" action="{{ route('project.signin') }}">
                @csrf
                <div class="form-row ">
                    <div class="form-group col-md-12">
                        <div class="form-group col-md-6">
                            <div class="form-row col-md-6 ">
                                <label for="project_name" class="visually-hidden h5" style="color: blue">Choose Project</label>
                            </div>
                            <div class="form-row col-md-6 ">
                                <select class="form-select form-select-lg @error('project_id') is-invalid @enderror " name="project_id" id="project_id">
                                    <option value="option_select" disabled selected>Projects</option>
                                    @foreach($projects as $project)
                                    <option value="{{$project->id}}">
                                        {{$project->project_name}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('project_id')
                                <span class="text-danger error-text">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary mb-4" >Sign In</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
