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

    const STATUS = [
        'LoggedIn'    => '1',
        'LoggedOut'   => '2'
    ];

    public function getStatus()
    {
        $status = null;
        switch ($this->status) {
            case '1':
                $seen = 'LoggedIn';
                break;
            case '2':
                $seen = 'LoggedOut';
                break;
        }
        return $status;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
