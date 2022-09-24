<?php

namespace App\Models;

use App\Traits\ProjectTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class ProjectAttendee extends Model
{
    use HasFactory;
    protected $table = 'project_attendees';
    protected $guarded = [];

    public function projects(){
        return $this->belongsTo(Project::class);
    }

}
