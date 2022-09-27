<?php

namespace App\Exports;

use App\Models\Project;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProjectAttendanceExport implements FromView
{
    public function view(): View
    {
        return view('exports.projectAttendance', [
            'projects' => Project::all(),
            'users'=>User::all()
        ]);
    }
}
