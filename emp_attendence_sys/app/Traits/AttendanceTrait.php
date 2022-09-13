<?php

namespace App\Traits;

use App\Models\ProjectAttendee;
use App\Models\User;

trait AttendanceTrait
{
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function projectAttendees(){
        return $this->hasMany(ProjectAttendee::class,'attendance_id');
    }

}
