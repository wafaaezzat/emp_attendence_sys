<?php

namespace App\Traits;


use App\Models\Project;

trait ClientTrait
{

    public function projects(){
        return $this->hasMany(Project::class);
    }

}
