<?php

namespace App\Listeners\Users;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class UpdateLastLoggedOutAt
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
//       $attendance= Attendance::where('user_id',Auth::id())->orderBy('created_at','desc')->first();
//        $attendance->update([
//            'sign_out'=>Carbon::now() ,
//            'status'=>2
//        ]);
    }
}
