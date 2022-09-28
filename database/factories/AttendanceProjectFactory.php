<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\AttendanceProject;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AttendanceProject>
 */
class AttendanceProjectFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AttendanceProject::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $projects = Project::pluck('id')->toArray();
        $attendances = Attendance::pluck('id')->toArray();

        return [
            'project_id' =>$this->faker->randomElement($projects),
            'attendance_id' =>$this->faker->randomElement($attendances),

        ];
    }
}
