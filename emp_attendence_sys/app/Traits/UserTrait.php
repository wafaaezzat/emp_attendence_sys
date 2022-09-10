<?php


namespace App\Traits;

use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;

trait UserTrait
{
    public function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function isAdmin()
    {
        if ($this->role->id == Role::NAME['ADMIN']) {
            return true;
        }
        return false;
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }



}
