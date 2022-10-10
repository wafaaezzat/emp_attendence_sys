@extends('dashboards.TeamLeaders.layouts.TeamLeader-dash-layout')
@section('title','Teams')
@section('content')

    <div class="row p-3 col-sm-4">
{{--        <button  type="button" id="modal-1-trigger"  class="btn btn-block btn-secondary modal-trigger btn-sm col-sm-3 p-2 "  data-toggle="modal"   data-target="#addModal">--}}
{{--            Create New Team--}}
{{--        </button>--}}
    </div>
    <div class="row p-3">
        @foreach($teams as $team)
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="font: bolder;font-size: larger">{{$team->name}}</h5>
                        <p class="card-text">Team Leader : {{$users->find($team->team_leader)->name}}</p>
                        <a href="{{route('show.team',$team->id)}}" class="btn btn-primary p-2 col-sm-3">Show</a>
{{--                        <button  type="button" value="{{$team->id}}" id="modal-0-trigger" class="modal-trigger btn btn-block btn-secondary btn-sm col-sm-3 p-2"   data-toggle="modal"  data-target="#demoModal">--}}
{{--                            Edit--}}
{{--                        </button>--}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>











{{--    <!--Add Modal Example Start-->--}}
{{--    <div class="modal fade" id="modal-1"  tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">Create Team</h5>--}}
{{--                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <form class="form-horizontal" method="POST" action="{{ route('add.team') }}" >--}}
{{--                        @csrf--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="punch_in" class="col-sm-2 col-form-label">team_name</label>--}}
{{--                            <div class="col-sm-4">--}}
{{--                                <input type="text"  id="t_name" name="t_name"  placeholder="Team Name" class="form-control @error('t_name') is-invalid @enderror">--}}
{{--                                @error('t_name')--}}
{{--                                <span class="text-danger error-text">{{$message}}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="leader_id" class="col-sm-2 col-form-label">Team Leader</label>--}}
{{--                            <div class="col-sm-4">--}}
{{--                                <select class="form-control"  name="leader_id" id="leader_id">--}}
{{--                                    <option value="option_select" disabled selected>Users</option>--}}
{{--                                    @foreach($users as $user)--}}
{{--                                        <option value="{{$user->id}}">--}}
{{--                                            {{$user->name}}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <div class="offset-sm-2 col-sm-10">--}}
{{--                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                                <button type="submit" class="btn btn-danger">Save Changes</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}










{{--    <!--Edit Modal Example Start-->--}}
{{--    <div class="modal fade" id="modal-0"  tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">Edit Team</h5>--}}
{{--                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <form class="form-horizontal" method="POST" action="{{ route('update.team') }}">--}}
{{--                        @csrf--}}
{{--                        <input type="hidden" id="team_id" name="team_id">--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="punch_in" class="col-sm-2 col-form-label">team_name</label>--}}
{{--                            <div class="col-sm-4">--}}
{{--                                <input type="text"  id="team_name" name="team_name"  placeholder="Team Name" class="form-control @error('team_name') is-invalid @enderror">--}}
{{--                                @error('team_name')--}}
{{--                                <span class="text-danger error-text">{{$message}}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="team_leader_id" class="col-sm-2 col-form-label">Teams</label>--}}
{{--                            <div class="col-sm-4">--}}
{{--                                <select class="form-control"  name="team_leader_id" id="team_leader_id">--}}
{{--                                    <option value="option_select" disabled selected>clients</option>--}}
{{--                                    @foreach($users as $user)--}}
{{--                                        <option value="{{$user->id}}">--}}
{{--                                            {{$user->name}}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <div class="offset-sm-2 col-sm-10">--}}
{{--                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                                <button type="submit" class="btn btn-danger">Save Changes</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}


{{--    <script>--}}
{{--        const triggers = document.getElementsByClassName('trigger');--}}
{{--        const triggerArray = Array.from(triggers).entries();--}}
{{--        const modals = document.getElementsByClassName('modal');--}}
{{--        const closeButtons = document.getElementsByClassName('btn-close');--}}

{{--        for (let [index, trigger] of triggerArray) {--}}
{{--            const toggleModal = () => {--}}
{{--                modals[index].classList.toggle('show-modal');--}}
{{--            }--}}
{{--            trigger.addEventListener("click", toggleModal);--}}
{{--            closeButtons[index].addEventListener("click", toggleModal);--}}
{{--        }--}}
{{--    </script>--}}

{{--        <script>--}}
{{--    $(document).ready(function (){--}}
{{--    $(document).on('click','#modal-0-trigger',function (){--}}

{{--    var team_id=$(this).val();--}}
{{--    $('#modal-0').modal('show');--}}
{{--    $.ajax({--}}
{{--    type:"GET",--}}
{{--    url:"/TeamLeader/edit/team/"+team_id,--}}
{{--    success:function (response){--}}
{{--    $('#team_name').val(response.team.name);--}}
{{--    $('#team_id').val(response.team.id);--}}
{{--    $('#team_leader_id').val(response.team.team_leader);--}}
{{--    console.log(team_id);--}}
{{--    }--}}

{{--    });--}}

{{--    });--}}

{{--    });--}}

{{--    </script>--}}



@endsection
