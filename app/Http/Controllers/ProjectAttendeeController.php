<?php

namespace App\Http\Controllers;

use App\Models\ProjectAttendee;
use App\Http\Requests\StoreProjectAttendeeRequest;
use App\Http\Requests\UpdateProjectAttendeeRequest;

class ProjectAttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(StoreProjectAttendeeRequest $request)
    {
        //
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
    public function edit(ProjectAttendee $projectAttendee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectAttendeeRequest  $request
     * @param  \App\Models\ProjectAttendee  $projectAttendee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectAttendeeRequest $request, ProjectAttendee $projectAttendee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectAttendee  $projectAttendee
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectAttendee $projectAttendee)
    {
        //
    }
}
