<?php

namespace App\Traits;

use App\Models\Attendance;
use App\Models\ProjectAttendee;
use App\Models\User;

trait AttendanceTrait
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function projectAttendees(){
        return $this->hasMany(ProjectAttendee::class,'attendance_id');
    }
    public  function days(){
        return $this->hasMany(Attendance::class,'created_at');
    }

}
