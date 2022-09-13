<?php

namespace App\Http\Controllers;

use App\Http\Resources\AttendanceResource;
use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->role_id==1){
            $perPage = $request->get('per_page', 15);
            $attendance = Attendance::where('user_id',Auth::user()->id)->get();
            return view('dashboards.admins.attendances')->with(['adminAttendances'=> AttendanceResource::collection($attendance)]);
        }
        elseif (Auth::user()->role_id==2){
            $attendance = Attendance::where('user_id',Auth::user()->id)->get();
            return view('dashboards.users.attendances')->with(['userAttendances'=>AttendanceResource::collection($attendance)]);
        }
    }










//$payment = new Payment();
//if (isset($request->job_order_id)){
//$payment = $payment->where('job_order_id', $request->job_order_id);
//}
//
//$perPage = $request->get('per_page', 15);
//return PaymentResource::collection($payment->paginate($perPage)->appends([
//    'per_page' => $perPage
//])
//);
//
//
//





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
