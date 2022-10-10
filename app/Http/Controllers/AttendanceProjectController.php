<?php

namespace App\Http\Controllers;

use App\Exports\ProjectAttendanceExport;
use App\Models\Attendance;
use App\Models\AttendanceProject;
use App\Http\Requests\UpdateAttendanceProjectRequest;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Project::all();
        $users=User::all();

        if(Auth::user()->role_id==1){
            return  view('dashboards.admins.projects.attendance',compact('projects','users'));
        }
        elseif (Auth::user()->role_id==3){
            return  view('dashboards.TeamLeaders.Teams.projectsAttendance',compact('projects','users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttendanceProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user=User::find(Auth::id());
        if(!isset($user->attendances()->latest()->first()->sign_in)){
            $project=Project::find($request->project_id);
            $request->validate([
                'project_id'=> 'required',
                'type'=> 'required',
            ]);
            Attendance::create([
                'user_id'=>Auth::id(),
                'sign_in'=>Carbon::now(),
                'type'=>$request->type,
                'status'=>1
            ]);
            $attendance= \DB::table('attendances')->where('user_id', Auth::id())->latest()->first();
            $project->attendances()->attach(Attendance::find($attendance->id));
            $user->projects()->attach($project);

            if(Auth::user()->role_id==1){
                return redirect('admin/dashboard')->with('success','you are signed in');
            }
            elseif (Auth::user()->role_id==2){
                return redirect('user/dashboard')->with('success','you are signed in ');
            }
            elseif (Auth::user()->role_id==3){
                return redirect('TeamLeader/dashboard')->with('success','you are signed in ');
            }

        }


//        if(!isset($user->attendances()->latest()->first()->sign_out)){
//            return redirect('admin/dashboard')->with('error','you should sign out first ');
//        }

        $project=Project::find($request->project_id);
        $request->validate([
            'project_id'=> 'required',
            'type'=> 'required',
        ]);
        Attendance::create([
            'user_id'=>Auth::id(),
            'type'=>$request->type,
            'sign_in'=>Carbon::now(),
            'status'=>1
        ]);
        $attendance= \DB::table('attendances')->where('user_id', Auth::id())->latest()->first();
        $project->attendances()->attach(Attendance::find($attendance->id));
        $user->projects()->attach($project);



        $user->active=1;
        $user->save();


        if(Auth::user()->role_id==1){
            return redirect('admin/dashboard')->with('success','you are signed in');
        }
        elseif(Auth::user()->role_id==2){
            return redirect('user/dashboard')->with('success','you are signed in ');
        }
        elseif(Auth::user()->role_id==3){
            return redirect('TeamLeader/dashboard')->with('success','you are signed in ');
        }

    }



    public function export()
    {
        return Excel::download(new ProjectAttendanceExport(), 'project_attendances.xlsx');
    }


    public function signout(){
        $user=User::find(Auth::id());
        $user->active=0;
        $user->save();
        $attendance=$user->attendances()->latest()->first();
        if(!isset($attendance->sign_out)) {
            $attendance->update([
                'sign_out' => Carbon::now(),
            ]);

            if (Auth::user()->role_id == 1) {
                return redirect('admin/dashboard')->with('success', 'you are signed Out');
            } elseif (Auth::user()->role_id == 2) {
                return redirect('user/dashboard')->with('success', 'you are signed Out');
            } elseif (Auth::user()->role_id == 3) {
                return redirect('TeamLeader/dashboard')->with('success', 'you are signed Out');
            }

        }
        else{

            if(Auth::user()->role_id==1){
                return redirect('admin/dashboard')->with('error','you are already signed Out');
            }
            elseif(Auth::user()->role_id==2){
                return redirect('user/dashboard')->with('error','you are already signed Out');
            }
            elseif(Auth::user()->role_id==3){
                return redirect('TeamLeader/dashboard')->with('error','you are already signed Out');
            }
        }

    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttendanceProject  $attendanceProject
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceProject $attendanceProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttendanceProject  $attendanceProject
     * @return \Illuminate\Http\Response
     */
    public function edit(AttendanceProject $attendanceProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttendanceProjectRequest  $request
     * @param  \App\Models\AttendanceProject  $attendanceProject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttendanceProjectRequest $request, AttendanceProject $attendanceProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttendanceProject  $attendanceProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendanceProject $attendanceProject)
    {
        //
    }
}
