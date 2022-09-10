<?php

namespace App\Traits;

use App\Models\User;

trait RoleTrait
{
    public function creator(){
        return $this->belongsTo(User::class, 'created_by');
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
