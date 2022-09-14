<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class UsersAtendanceController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function index(Request $request)
    {
            $attendances = Attendance::all();
        return view('dashboards.admins.usersAttendance', compact('attendances'));

    }

}
