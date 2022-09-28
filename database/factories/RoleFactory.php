<?php

namespace Database\Factories;

use App\Models\User;
use Dotenv\Util\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::pluck('id')->toArray();

        return [
            'name'=>$this->faker->randomElement(['admin','user']),
            'created_by' =>$this->faker->randomElement($users),
        ];
    }
}
