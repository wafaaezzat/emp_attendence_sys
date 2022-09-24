<?php

namespace App\Traits;

use App\Models\Attendance;
use App\Models\Project;
use App\Models\ProjectAttendee;
use App\Models\User;

trait AttendanceTrait
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function projects(){
        return $this->belongsToMany(Project::class);
    }
    public  function days(){
        return $this->hasMany(Attendance::class,'created_at');
    }

}
