<?php

namespace App\Http\Controllers;

use App\Exports\AttendancesExport;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UsersAtendanceController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function index(Request $request)
    {
            $attendances = Attendance::all();
        $users = User::all();
        return view('dashboards.admins.usersAttendance', compact('attendances','users'));

    }

    public function export()
    {
        return Excel::download(new AttendancesExport(), 'attendances.xlsx');
    }
}
