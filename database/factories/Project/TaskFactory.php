<?php

namespace Database\Factories\Project;

use App\Models\Project\Section;
use App\Models\Project\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(4),
            'section_id' => Section::factory(),
            'priority' => $this->faker->randomElement(['Low', 'Medium', 'High']),
            'status' => $this->faker->randomElement(['Pending', 'In Progress', 'Completed']),
            'assignee_id' => null,
        ];
    }
}
