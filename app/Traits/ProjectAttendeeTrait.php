<?php

namespace App\Traits;

use App\Models\Attendance;
use App\Models\Project;
use App\Models\User;

trait ProjectAttendeeTrait
{
    public function projects(){
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}

