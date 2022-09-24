<?php

namespace App\Traits;
use App\Models\Attendance;
use App\Models\ProjectAttendee;
use App\Models\User;

trait ProjectTrait
{
    public function attendances(){
        return $this->belongsToMany(Attendance::class)->withTimestamps();
    }





}
