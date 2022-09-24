<?php

namespace App\Http\Controllers;

use App\Models\AttendanceProject;
use App\Http\Requests\StoreAttendanceProjectRequest;
use App\Http\Requests\UpdateAttendanceProjectRequest;

class AttendanceProjectController extends Controller
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
     * @param  \App\Http\Requests\StoreAttendanceProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttendanceProjectRequest $request)
    {
        //
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
