<?php

namespace App\Http\Controllers;

use App\Models\ProjectAttendee;
use App\Http\Requests\StoreProjectAttendeeRequest;
use App\Http\Requests\UpdateProjectAttendeeRequest;
use Illuminate\Http\Request;

class ProjectAttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectAttendees=ProjectAttendee::all();
        return view('dashboards.admins.projectAttendee' ,compact('projectAttendees'));
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
     * @param  \App\Http\Requests\StoreProjectAttendeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_id'=> 'required|numeric',
            'attendance_id' => 'required|numeric'
        ]);
        ProjectAttendee::create([
            'project_id' => $request->project_id,
            'attendance_id' =>$request->attendance_id
        ]);
        return redirect('admin/projectAttendees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectAttendee  $projectAttendee
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectAttendee $projectAttendee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectAttendee  $projectAttendee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = ProjectAttendee::find($id);
        return view('dashboards.admins.projectAttendees.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectAttendeeRequest  $request
     * @param  \App\Models\ProjectAttendee  $projectAttendee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $projectAttendee = ProjectAttendee::find($id);
        $request->validate([
            'project_id'=> 'required|numeric',
            'attendance_id' => 'required|numeric'
        ]);
        $projectAttendee->project_id =  $request->get('project_id');
        $projectAttendee->attendance_id = $request->get('attendance_id');
        $projectAttendee->save();

        return redirect('admin/projectAttendees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectAttendee  $projectAttendee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $projectAttendee = ProjectAttendee::find($id);
         $projectAttendee->delete();

        return redirect('admin/projectAttendees');
    }
}
