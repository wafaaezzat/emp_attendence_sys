@extends('dashboards.TeamLeaders.layouts.TeamLeader-dash-layout')
@section('title','attendances ber day')
@section('content')

    <div class="card-body">
        <div class="col-md-12">
            <form  method="GET" action="{{ route('TeamLeader.membersBerDayFilter') }}">
                <div class="form-row ">
                    <div class="form-group col-md-3">
                        <label for="start_date" class="visually-hidden">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ request()->start_date }}" placeholder="Start Date">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="end_date" class="visually-hidden">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ request()->end_date }}" placeholder="End Date">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="search_name" class="visually-hidden">Search Name</label>
                        <input type="search" id="search_name" name="user_name" value="{{ request()->user_name }}" class="form-control" placeholder="Search Name" aria-label="Search" />
                    </div>
                    <div class="form-group col-md-3">
                        <label for="search_id" class="visually-hidden">Search User ID</label>
                        <input type="search" id="search_id" name="user_id" value="{{ request()->user_id }}" class="form-control" placeholder="Search User ID" aria-label="Search" />
                    </div>
                </div>
                <div class="offset-6">
                    <button type="submit" class="btn btn-secondary mb-4" >Submit</button>
                </div>

            </form>
        </div>
    </div>
    <!-- ./card-header -->
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                {{--            <th>ID</th>--}}
                <th>User ID</th>
                <th>User Name</th>
                <th>Projects</th>
                <th>Punch In</th>
                <th>Punch Out</th>
                <th>Date</th>
                <th>Total Hours</th>
                <th>Status</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($members as $user)
{{--                    <?php--}}
{{--                    $attendances = $start && $end != null ? ($user->userAttendanceBerDays->whereBetween('created_at',[$start,$end])) : $user->userAttendanceBerDays;--}}
{{--                    ?>--}}
                @foreach($user->userAttendanceBerDays as $attendance)
                    {{--                @dd($attendance)--}}
                    <tr data-widget="expandable-table" aria-expanded="false">
                        {{--                    <td>{{$attendance->id}}</td>--}}
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}
                            @if($attendance->firstSignIN==36000)
                                <h6><span class="badge badge-success">OnTime</span></h6>
                            @endif
                            @if($attendance->firstSignIN>36000)
                                <h6><span class="badge badge-warning"> {{\Carbon\CarbonInterval::seconds($attendance->firstSignIN-36000)->cascade()->forHumans()}} Late</span></h6>
                            @endif
                            @if($attendance->lastSignOut<68400)
                                <h6><span class="badge badge-danger">Left {{\Carbon\CarbonInterval::seconds(68400-$attendance->lastSignOut)->cascade()->forHumans()}} Hours Earlier</span></h6>
                            @endif

                        </td>
                        <td>
                            @foreach($attendance->projects as $project)
                                <h6><span class="badge badge-dark">{{$project->project_name}}</span></h6>
                            @endforeach
                        </td>
                        <td><h6><span class="badge badge-info">{{$attendance->sign_in}}</span></h6></td>
                        <td><h6><span class="badge badge-info">{{$attendance->lastlogoutTime}}</span></h6></td>
                        <td>{{$attendance->created_at->format('d/m/Y')}}</td>
                        <td>{{(int)$attendance->lastlogoutTime-(int)$attendance->firstlogin}}</td>
                        <td><h6><span class="badge badge-secondary">{{$attendance->type}}</span></h6></td>
                        <td>
                            <button type="button" value="{{$attendance->id}}" id="editbtn"  class="btn btn-block btn-secondary btn-sm" data-toggle="modal"  data-target="#demoModal">
                                <i class="fa-sharp fa-solid fa-pen"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>

        <div>
            @if(!(isset($user_name)||isset($user_id)||isset($start)||isset($end)))
{{--                {!!$users->links("pagination::bootstrap-5")!!}--}}
            @endif
        </div>

    </div>

    <br>
    <!-- Modal Example Start-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Attendance</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ route('TeamLeader.updateAttendance') }}">
                        @csrf
                        <input type="hidden" id="attendance_id" name="attendance_id">
                        <input type="hidden" id="date" name="date">
                        <input type="hidden" id="user_id" name="user_id">
                        <div class="form-group row">
                            <label for="punch_in" class="col-sm-2 col-form-label">Punch In</label>
                            <div class="col-sm-4">
                                <input type="time"  id="sign_in" name="punch_in"  placeholder="Punch In" class="form-control @error('punch_in') is-invalid @enderror">
                                @error('punch_in')
                                <span class="text-danger error-text">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="punch_out" class="col-sm-2 col-form-label">Punch Out</label>
                            <div class="col-sm-4">
                                <input type="time" id="sign_out" name="punch_out" placeholder="Punch Out"  class="form-control @error('punch_out') is-invalid @enderror" >
                                @error('punch_out')
                                <span class="text-danger error-text">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>














    <!-- Modal Example End-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>


        $(document).ready(function (){
            $(document).on('click','#editbtn',function (){

                var attendance_id=$(this).val();
                $('#editModal').modal('show');
                $.ajax({
                    type:"GET",
                    url:"/TeamLeader/edit/attendance/"+attendance_id,
                    success:function (response){
                        $('#sign_in').val(response.attendance.sign_in);
                        $('#sign_out').val(response.attendance.sign_out);
                        $('#attendance_id').val(response.attendance.id);
                        $('#user_id').val(response.attendance.user_id);
                        $('#date').val(new Date(response.attendance.created_at).toISOString().split('T')[0]);
                        console.log( new Date(response.attendance.created_at).toISOString().split('T')[0],response.attendance.id,response.attendance.user_id);
                    }

                });

            });

        });

    </script>

@endsection
