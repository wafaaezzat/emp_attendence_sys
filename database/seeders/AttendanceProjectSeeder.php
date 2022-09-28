<?php

namespace Database\Seeders;

use App\Models\AttendanceProject;
use Database\Factories\AttendanceProjectFactory;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AttendanceProject::factory()->count(20)->create();

    }
}
