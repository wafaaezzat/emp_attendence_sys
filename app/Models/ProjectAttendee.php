<?php

namespace App\Models;

use App\Traits\ProjectAttendeeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAttendee extends Model
{
    use HasFactory, ProjectAttendeeTrait;
    protected $table = 'project_attendees';
    protected $guarded = [];
}
