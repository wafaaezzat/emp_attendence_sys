<?php


namespace App\Traits;

use App\Models\Attendance;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

trait UserTrait
{
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function isAdmin()
    {
        if ($this->role->id == Role::NAME['ADMIN']) {
            return true;
        }
        return false;
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

//    public function attendancesBerDay(){
//        return $this->hasMany(Attendance::class)->select('*',\DB::raw("sum(TIME_FORMAT(sign_in,'%H %k %h %I %l')) as total_hours"),\DB::raw('DATE_FORMAT(created_at, \'%Y-%m-%d\')as date '),\DB::raw('MAX(sign_out) as lastlogout'))->groupBy('date');
//    }


    public function attendancesBerDay()
    {
        return $this->hasMany(Attendance::class)->select('*', \DB::raw('DATE_FORMAT(created_at, \'%Y-%m-%d\')as date '), \DB::raw('MAX(time_to_sec(sign_out) / (60 * 60)) as lastlogout'), \DB::raw('MAX(sign_out)as lastlogoutTime'), \DB::raw('time_to_sec(sign_in) / (60 * 60) as firstlogin'))->groupBy('date');
    }


    public function attendanceFilter(Request $request){
        return $this->hasMany(Attendance::class)->select('*', \DB::raw('DATE_FORMAT(created_at, \'%Y-%m-%d\')as date '), \DB::raw('MAX(time_to_sec(sign_out) / (60 * 60)) as lastlogout'), \DB::raw('MAX(sign_out)as lastlogoutTime'), \DB::raw('time_to_sec(sign_in) / (60 * 60) as firstlogin'))->groupBy('date')->whereBetween('date', [$request->start_date, $request->end_date]);
    }





}
