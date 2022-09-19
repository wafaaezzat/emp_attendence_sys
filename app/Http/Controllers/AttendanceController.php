<?php

namespace App\Http\Controllers;
use App\Exports\UserAttendancesExport;
use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function index()
    {

        $users = User::where('id', Auth::id())->get();
        if (Auth::user()->role_id==1){
            return view('dashboards.admins.attendances', compact('users'));
        }
        elseif (Auth::user()->role_id==2){
            return view('dashboards.users.attendances', compact('users'));
        }


    }

    function filter(Request $request)
    {
        if(isset($request->clear)){
            $request->start_date=" ";
            $request->end_date=" ";
        }
        $start= $request->start_date;
        $end= $request->end_date;
        $users = User::where('id', Auth::id())->get();
        if (Auth::user()->role_id==1){
            return view('dashboards.admins.attendances', compact('users','start','end'));
        }
        elseif (Auth::user()->role_id==2){
            return view('dashboards.users.attendances', compact('users','start','end'));
        }

    }

    public function export()
    {
        return Excel::download(new UserAttendancesExport(), 'user_attendances.xlsx');
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
     * @param  \App\Http\Requests\StoreAttendanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttendanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendence
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendence)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendence
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttendanceRequest  $request
     * @param  \App\Models\Attendance  $attendence
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendence)
    {
        //
    }
}