<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;


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
        File::cleanDirectory(storage_path().'/framework/sessions');
        User::query()->update(['remember_token' => '']);
    }
}
