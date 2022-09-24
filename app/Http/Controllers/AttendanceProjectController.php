<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceProject;
use App\Http\Requests\StoreAttendanceProjectRequest;
use App\Http\Requests\UpdateAttendanceProjectRequest;
use App\Models\Project;
use App\Models\ProjectAttendee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return  view('dashboards.admins.projects.attendance',compact('projects'));
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
        $project=Project::find($request->project_id);
        $request->validate([
            'project_id'=> 'required',
        ]);
        Attendance::create([
            'user_id'=>Auth::id(),
            'sign_in'=>Carbon::now(),
            'status'=>1
        ]);
        $attendance= \DB::table('attendances')->where('user_id', Auth::id())->latest()->first();
        $project->attendances()->attach(Attendance::find($attendance->id));

        if(Auth::user()->role_id==1){
            return redirect('admin/dashboard');
        }
        else{
            return redirect('user/dashboard');
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
