<?php

namespace App\Models;

use App\Traits\AttendanceTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
     use HasFactory, AttendanceTrait;
    protected $table = 'attendances';
    protected $guarded = [];

    const STATUS = [
        'ABSENT'    => '0',
        'PRESENT'   => '1'
    ];
}
