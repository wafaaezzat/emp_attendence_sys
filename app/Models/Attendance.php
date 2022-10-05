<?php

namespace App\Models;

use App\Traits\AttendanceTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Attendance extends Model
{
     use HasFactory, AttendanceTrait ,Sortable
;
    protected $guarded = [];

    protected $table = 'attendances';
//    protected $appends = ['date'];



}
