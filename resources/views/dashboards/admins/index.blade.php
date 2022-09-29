@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Dashboard')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-secondary alert-dismissible" role="alert">
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

    <div class="col-md-3">
        <form method="GET" action="{{ route('project.signin') }}">
            @csrf
            <div class="card card-secondary card-outline text-center">
                <div class="card-body box-profile ">
                    <div class="text-center">
                        <label for="project_name" class="visually-hidden h5" style="color:#343a40">Choose Project</label>
                        <div class="text-center">
                            <select class="form-select form-select-lg @error('project_id') is-invalid @enderror " name="project_id" id="project_id">
                                <option value="option_select" disabled selected>Projects</option>
                                @foreach($projects as $projectx)
                                    <option value="{{$projectx->id}}">
                                        {{$projectx->project_name}}
                                    </option>
                                @endforeach
                                </select>
                                <div>
                                @error('project_id')
                                <span class="text-danger error-text">{{$message}}</span>
                                @enderror
                                </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-secondary mb-4 " >Sign In</button>
                    </div>
                </div>
            </div>
        </form>
    </div>



    <div class="col-md-3">
        <form method="GET" action="{{ route('project.signout')}}">
            @csrf
            <div class="card card-secondary card-outline text-center">
                <div class="card-body box-profile ">
                    <div class="text-center">
                        <label for="project_name" class="visually-hidden h5" style="color:#343a40">Sign Out Your Project</label>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-secondary mb-4" >Sign Out</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-3">
        <div class="card card-secondary card-outline text-center">
            <h1>{{$project->project_name}}</h1>
            <div class="card-body box-profile">
                {!! $chart->container() !!}
                {!! $chart->script() !!}
            </div>
        </div>
    </div>



@endsection
