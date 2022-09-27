<?php

namespace App\Traits;
use App\Models\Attendance;
use App\Models\Client;
use App\Models\ProjectAttendee;
use App\Models\User;

trait ProjectTrait
{
    public function attendances(){
        return $this->belongsToMany(Attendance::class)->withTimestamps();
    }

    public function UserProjectAttendances(){
      return $this->attendances()->select('user_id',\DB::raw('sum(attendances.total_hours) as sum'))->groupBy('user_id');
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
