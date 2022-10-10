<?php

namespace App\Traits;

use App\Models\User;

trait TeamTrait
{
    public function members(){
        return $this->hasMany(User::class);
    }


}
