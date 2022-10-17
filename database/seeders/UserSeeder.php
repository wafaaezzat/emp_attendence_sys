<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create();
        User::insert([
            'name' => 'wafaa',
            'phone' => '01122655338',
            'address' => 'dd jwhgdsjwgd',
            'bio' => 'cs',
            'role_id' =>'1',
            'email' => 'wafaaezzat371@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),]);

    }
}
