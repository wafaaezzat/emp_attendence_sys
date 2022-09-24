<?php

namespace App\Http\Controllers;

use App\Exports\AttendancesExport;
use App\Exports\UserAttendanceExport;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $start=null;
        $end=null;
        $users = User::all();
        return view('dashboards.admins.usersAttendance', compact('users','start','end'));
    }

    public function export(User $user)
    {
        return Excel::download(new UserAttendanceExport(), 'attendances.xlsx');
    }
    function filter(Request $request)
    {
        $users = new User();
        $start=$request->start_date;
        $end=$request->end_date;
        if (isset($request->user_name)){
            $users = $users->where('name','LIKE','%'.$request->user_name.'%');
        }
        $users = $users->get();
        return view('dashboards.admins.usersAttendance', compact('users','start','end'));
    }



}
