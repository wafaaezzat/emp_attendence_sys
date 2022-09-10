<?php

namespace App\Traits;
use App\Models\ProjectAttendee;
use App\Models\User;

trait ProjectTrait
{
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function projectAttendees(){
        return $this->hasMany(ProjectAttendee::class);
    }
}
