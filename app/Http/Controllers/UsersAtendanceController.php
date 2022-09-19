<?php

namespace App\Http\Controllers;

use App\Exports\AttendancesExport;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class UsersAtendanceController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function index()
    {
        $attendances = Attendance::all();
        $users = User::all();
        return view('dashboards.admins.usersAttendance', compact('attendances','users'));

    }

    public function export()
    {
        return Excel::download(new AttendancesExport(), 'attendances.xlsx');
    }



    function filter(Request $request)
    {
        $users = User::all();
        $name=$request->user_name;
        if(isset($request->clear)){
            $request->start_date=" ";
            $request->end_date=" ";
        }
        $start= $request->start_date;
        $end= $request->end_date;
        return view('dashboards.admins.usersAttendance', compact('users','start','end','name'));

    }



}
