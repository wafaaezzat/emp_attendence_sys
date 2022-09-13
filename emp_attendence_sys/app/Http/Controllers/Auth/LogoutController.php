<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{


    function logout(Request $request)
    {
        Attendance::create([
            'user_id'=>Auth::id(),
            'sign_out' => Carbon::now()->toDateTimeString(),
            'status'=>2
        ]);
    }
}
