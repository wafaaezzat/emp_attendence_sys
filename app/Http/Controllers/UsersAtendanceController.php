<?php

namespace App\Http\Controllers;

use App\Exports\AllUsersviewExport;
use App\Exports\AttendancesExport;
use App\Exports\MyAttendanceBerDayExport;
use App\Exports\UserAttendanceBerDayExport;
use App\Exports\UserAttendanceExport;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
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
        $users = User::paginate(5);
        return view('dashboards.admins.usersAttendance', compact('users','start','end'));
    }




    public function attendanceBerday(){
        $start=null;
        $end=null;
        $users = User::paginate(5);
        return view('dashboards.admins.attendancesBerDay', compact('users','start','end'));
    }


    public function export()
    {
        return Excel::download(new AllUsersviewExport(), 'attendances.xlsx');
    }


    public function exportone()
    {
        return Excel::download(new UserAttendanceBerDayExport(), 'attendancesBerDay.xlsx');
    }

    public function exporttwo()
    {
        return Excel::download(new MyAttendanceBerDayExport(), 'attendancesBerDay.xlsx');
    }
    function filter(Request $request)
    {
        $users = User::paginate(5);
        $start=$request->start_date;
        $end=$request->end_date;
        $user_id=$request->user_id;
        $user_name=$request->user_name;
        if (isset($request->user_name)){
            $users = $users->where('name','LIKE','%'.$request->user_name.'%');
        }
        if (isset($request->user_id)){
            $users = $users->where('id','=',$request->user_id);
        }
        return view('dashboards.admins.usersAttendance', compact('users','start','end'));
    }

    function usersBerDayFilter(Request $request)
    {
        $users = User::paginate(5);
        $start=$request->start_date;
        $end=$request->end_date;
        $user_id=$request->user_id;
        $user_name=$request->user_name;


        if (isset($request->user_name)){
            $users = $users->where('name','LIKE','%'.$request->user_name.'%');
        }
        if (isset($request->user_id)){
            $users = $users->where('id','=',$request->user_id);
        }
        return view('dashboards.admins.attendancesBerDay', compact('users','start','end','user_id','user_name'));
    }


    public function edit($id)
    {
        $attendance = Attendance::find($id);
        return response()->json([
            'status'=>200,
            'attendance'=>$attendance
        ]);
    }

    public function update(Request $request)
    {

//        dd($request->punch_in);
        $date=$request->date;
        $user=User::find($request->user_id);
        $attendance = Attendance::find($request->attendance_id);
        $attendance->update([
            'sign_in'=>$request->punch_in,
        ]);
        if(isset($request->punch_out)){
            $user->lastuserAttendanceBerDays($date)->first()->update([
                'sign_out'=>$request->punch_out,
            ]);
        }
        return Redirect::back()->with('success','attendance updated successfully');
    }

}
