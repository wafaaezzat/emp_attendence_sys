<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use function GuzzleHttp\Promise\all;

class MyExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $user= User::find(Auth::id());
    }

    public function map($user) : array {
        $user=User::find(Auth::id());
        $data = [];
        foreach($user->attendancesBerDays as $attendancesBerDay){
            array_push($data
                ,$attendancesBerDay->id
                ,$user->name
                ,$attendancesBerDay->user_id
                , $attendancesBerDay->date
                ,$attendancesBerDay->sign_in
                ,$attendancesBerDay->lastlogoutTime
                ,(int)$attendancesBerDay->lastlogoutTime-(int)$attendancesBerDay->firstlogin

            );
        }
        return $data ;
    }
    public function headings() : array {
        return [
            'ID',
            'User Name',
            'User ID',
            'Date',
            'First SignIn',
            'Last SinOut',
            'Total Hours'
        ] ;
    }
}
