<?php

namespace App\Exports;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
//use Maatwebsite\Excel\Concerns\WithHeadings;
//use Maatwebsite\Excel\Concerns\WithMapping;

class AttendancesExport implements FromCollection
//    , WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::with('attendancesBerDay')->get();
    }


//
//        public function map($user) : array {
//        return [
//            $user->attendancesBerDay->id,
//            $user->attendancesBerDay->user_id,
//            $user->attendancesBerDay->sign_in,
//            $user->attendancesBerDay->lastlogoutTime,
//            Carbon::parse($user->attendancesBerDay->created_at)->toFormattedDateString()
//        ] ;
//    }
//
//    public function headings() : array {
//        return [
//            'ID',
//            'Date',
//            'First SignIn',
//            'Last SinOut',
//            'Created At'
//        ] ;
//    }
}
