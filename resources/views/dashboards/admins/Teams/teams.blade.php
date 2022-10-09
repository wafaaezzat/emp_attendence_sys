@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Teams')
@section('content')

    <div class="row p-3">
        @foreach($teams as $team)
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="font: bolder;font-size: larger">{{$team->name}}</h5>
                        <p class="card-text">Team Leader : {{$users->find($team->team_leader)->name}}</p>
                        <a href="{{route('show.team',$team->id)}}" class="btn btn-primary">Show</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
