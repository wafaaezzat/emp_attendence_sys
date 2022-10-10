@extends('dashboards.TeamLeaders.layouts.TeamLeader-dash-layout')
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

    <!-- /.col -->
    <div class="col-md-12">
    <div class="row">
        <div class="col-lg-3 col-md-3 ">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{$users->count()}}</h3>
                    <p>Registered User</p>
                </div>
                <div class="icon">
                    <i class="nav-icon  fa-solid fa-user"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 ">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3> @foreach($user->userAttendancesBerDays as $userAttendancesBerDay)
                            {{floor($userAttendancesBerDay->totalHours)}} Hour
                        @endforeach
                    </h3>
                    <p>Your Total Hours Today</p>
                </div>
                <div class="icon">
                    <i class="nav-icon  fa-solid fa-user"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 ">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{$count}}</h3>
                    <p>Active Users</p>
                </div>
                <div class="icon">
                    <i class="nav-icon  fa-solid fa-clipboard-user"></i>
                </div>
            </div>
        </div>
    </div>
        <div class="card">
{{--            <div class="card-header p-2">--}}
{{--                <ul class="nav nav-pills">--}}
{{--                    <li class="nav-item"><a class="nav-link active" href="#signin_out" data-toggle="tab">SignIn/Out</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" href="#project_view" data-toggle="tab">Project View</a></li>--}}
{{--                </ul>--}}
{{--            </div><!-- /.card-header -->--}}
            <div class="card-body">
{{--                <div class="tab-content">--}}
                    <div class="active tab-pane" id="signin_out">
                        @if($user->active==0)
                            <form method="GET" class="form-horizontal" action="{{ route('project.signin') }}">
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

                                            <div class=" @error('type') is-invalid @enderror mt-5 row">
                                                <div>
                                                <input type="radio" id="online" name="type" value="online">
                                                <label for="online">OnlineL</label><br>

                                                <input type="radio" id="onsite" name="type" value="onsite">
                                                <label for="onsite">Onsite</label><br>
                                                <div>
                                                    @error('type')
                                                    <span class="text-danger error-text">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-secondary mb-4 " style="width: 150px"  id="start-btn"  name="sign_in" >Sign In</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        @elseif($user->active==1)
                            <form method="GET" class="form-horizontal" action="{{ route('project.signout')}}">
                                @csrf
                                <div class="card card-secondary card-outline text-center">
                                    <div class="card-body box-profile ">
                                        <div class="text-center">
                                            <label for="project_name" class="visually-hidden h5" style="color:#343a40">Sign Out Your Project</label>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-secondary mb-4" style="width: 150px"  id="stop-btn" name="sign_out" >Sign Out</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                    <div class="active tab-pane" id="project_view">
                        <div class="row col-lg-12">
                            <div class="col-md-3" >
                                <div class="card card-secondary card-outline text-center">
                                    <h3>Spent Time On project
                                    </h3>
                                    <div class="card-body box-profile" style="font-size:50px;color: #1a174d;">
                                        <p id="demo"></p>
                                    </div>
                                </div>
                            </div>
                            @if(isset($project,$chart,$chart_effort))
                            <div class="col-md-3">
                                <div class="card card-secondary card-outline text-center">
                                    <h3>{{$project->project_name}}</h3>
                                    <div class="card-body box-profile">
                                        {!! $chart->container() !!}
                                        {!! $chart->script() !!}
                                    </div>
                                </div>
                            </div>

{{--                            <div class="col-md-3">--}}
{{--                                <div class="card card-secondary card-outline text-center">--}}
{{--                                    <h3> {{$project->project_name}} </h3>--}}
{{--                                    <div class="card-body box-profile">--}}
{{--                                        {!! $chart_effort->container() !!}--}}
{{--                                        {!! $chart_effort->script() !!}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
{{--        </div>--}}
        <!-- /.card -->
    </div>






    <script>

    let day = 0;
    let hour = 0;
    let minute = 0;
    let seconds = 0;
    let startTimestamp = 0;
    let intervalId = null;

    function updateTimer() {
        let totalSeconds = (Date.now() - startTimestamp) / 1000;
        day = Math.floor(totalSeconds/86400);
        hour = Math.floor(totalSeconds /3600);
        minute = Math.floor((totalSeconds - hour*3600)/60);
        seconds = Math.floor(totalSeconds - (hour*3600 + minute*60));


        document.getElementById("demo").innerHTML = day + "D " + hour + "H "
            + minute + "M " + seconds + "S ";

        // document.getElementById("day").innerHTML = day+':';
        // document.getElementById("hour").innerHTML = hour+':';
        // document.getElementById("minute").innerHTML = minute+':';
        // document.getElementById("seconds").innerHTML = seconds;
    }

    {
        const _startTimestamp = localStorage.getItem("start-timestamp");
        if (_startTimestamp) {
            startTimestamp = Number(_startTimestamp);
            intervalId = setInterval(updateTimer, 1000);
        }
    }

    document.getElementById('start-btn').addEventListener('click', () => {
        if (!intervalId) {
            startTimestamp = Date.now();
            localStorage.setItem("start-timestamp", startTimestamp);
            intervalId = setInterval(updateTimer, 1000);
        }
    })


</script>


    <script>
        document.getElementById('stop-btn').addEventListener('click', () => {
            if (intervalId) {
                clearInterval(intervalId);
                localStorage.removeItem("start-timestamp");
                document.getElementById("demo").innerHTML = day + "D " + hour + "H "
                    + minute + "M " + seconds + "S ";
            }
        });
    </script>

    <script>
        document.getElementById('reset-btn').addEventListener('click', () => {
            totalSeconds = 0;
            document.getElementById("demo").innerHTML = day + "d " + hour + "h "
                + minute + "m " + seconds + "s ";
            // document.getElementById("day").innerHTML = '0'+':';
            // document.getElementById("hour").innerHTML = '0'+':';
            // document.getElementById("minute").innerHTML = '0'+':';
            // document.getElementById("seconds").innerHTML = '0';
        });
    </script>

@endsection
