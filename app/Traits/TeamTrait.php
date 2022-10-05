<?php

namespace App\Traits;

use App\Models\User;

trait TeamTrait
{
    public function members(){
        return $this->hasMany(User::class);
    }

    public function team_leader(){
        return $this->hasOne(User::class,'team_leader','id');
    }
}
