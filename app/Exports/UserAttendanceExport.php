<?php

namespace App\Exports;

use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserAttendanceExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::with('attendancesBerDay')->get();
    }
    public function map($user) : array {
        foreach ($user->attendancesBerDay as $attendance){
           $data= [
               $attendance->id,
               $attendance->user_id,
               $attendance->sign_in,
               $attendance->lastlogoutTime,
               Carbon::parse($attendance->created_at)->toFormattedDateString()
            ] ;
        }
        return $data ;
    }
    public function headings() : array {
        return [
            'ID',
            'Date',
            'First SignIn',
            'Last SinOut',
            'Created At'
        ] ;
    }
}
