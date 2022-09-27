<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;



class flushSession extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flush:session';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'flush session to logout all users at 7:PM ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $users=User::all();
       foreach ($users as $user){
           $attendance=$user->attendances()->latest()->first();
           if (!isset($attendance->sign_out)){
               $attendance->update([
                   'sign_out'=>Carbon::now(),
               ]);
           }
       }
    }
}
