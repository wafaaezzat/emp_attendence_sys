<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class CheckUserIsActiveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if user is active on the website';

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
            if(!(Cache::has('user-is-online-' . $user->id))){
                $user->active=0;
                $user->save();
                $attendance->update([
                    'sign_out'=>Carbon::now(),
                ]);
                if (isset($_SESSION['previous'])) {
                    if (basename($_SERVER['PHP_SELF']) != $_SESSION['previous']) {
                        session_destroy();
                    }
                }
            }
        }
    }
}
