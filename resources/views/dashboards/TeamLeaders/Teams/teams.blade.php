@extends('dashboards.TeamLeaders.layouts.TeamLeader-dash-layout')
@section('title','My Team')
@section('content')

    <div class="row p-3 col-sm-4">
    </div>
    <div class="row p-3">
        @foreach($teams as $team)
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="font: bolder;font-size: larger">{{$team->name}}</h5>
                        <p class="card-text">Team Leader : {{$users->find($team->team_leader)->name}}</p>
                        <a href="{{route('TeamLeader.showTeam',$team->id)}}" class="btn btn-primary p-2 col-sm-3">Show</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
