<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AllUsersviewExport implements FromView
{
    public function view(): View
    {
        return view('exports.AllUsers', [
            'users' => User::all()
        ]);
    }
}
