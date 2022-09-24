<?php

namespace App\Models;

use App\Traits\ProjectAttendanceTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAttendance extends Model
{
    use HasFactory,ProjectAttendanceTrait ;
    protected $guarded = [];
    protected $table='project_attendances';

}
