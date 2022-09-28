<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $clients = Client::pluck('id')->toArray();
        return [
            'name' => $this->faker->company(),
            'country' => $this->faker->country(),
            'status' => 1,
            'client_id' =>$this->faker->randomElement($clients),
        ];
    }
}
