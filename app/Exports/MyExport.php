<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MyExport implements FromView
{

    public function view(): View
    {
        return view('exports.myExport', [
            'user' => User::find(Auth::id())
        ]);
    }



//    /**
//    * @return \Illuminate\Support\Collection
//    */
//    public function collection()
//    {
//        return $user= User::find(Auth::id());
//    }
//
//    public function map($user) : array {
//        $user=User::find(Auth::id());
//        $data = [];
//        foreach($user->attendancesBerDays as $attendancesBerDay){
//            array_push($data
//                ,$attendancesBerDay->id
//                ,$user->name
//                ,$attendancesBerDay->user_id
//                , $attendancesBerDay->date
//                ,$attendancesBerDay->sign_in
//                ,$attendancesBerDay->lastlogoutTime
//                ,(int)$attendancesBerDay->lastlogoutTime-(int)$attendancesBerDay->firstlogin
//
//            );
//        }
//        return $data ;
//    }
//    public function headings() : array {
//        return [
//            'ID',
//            'User Name',
//            'User ID',
//            'Date',
//            'First SignIn',
//            'Last SinOut',
//            'Total Hours'
//        ] ;
//    }
}
