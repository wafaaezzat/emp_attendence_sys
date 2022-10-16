<?php

namespace App\Console\Commands;

use App\Exports\AllUsersviewExport;
use App\Exports\MyAttendanceBerDayExport;
use App\Exports\MyExport;
use App\Exports\ProjectAttendanceExport;
use App\Exports\ProjectExport;
use App\Exports\UserAttendanceBerDayExport;
use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class GetExports extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:exports';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get exports every month';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Excel::download(new AllUsersviewExport(), 'UsersAttendances.xlsx');
        Excel::download(new UserAttendanceBerDayExport(), 'UsersAttendancesBerDay.xlsx');
        Excel::download(new ProjectExport(), 'projects.xlsx');
        Excel::download(new ProjectAttendanceExport(), 'project_attendances.xlsx');
        Excel::download(new UsersExport(), 'users.xlsx');
    }
}
