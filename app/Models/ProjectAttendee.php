<?php

namespace App\Models;

use App\Traits\ProjectAttendeeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class ProjectAttendee extends Model
{
    use HasFactory, ProjectAttendeeTrait,Sortable;
    protected $table = 'project_attendees';
    protected $guarded = [];
}
