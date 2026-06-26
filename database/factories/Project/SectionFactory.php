<?php

namespace Database\Factories\Project;

use App\Models\Project\Project;
use App\Models\Project\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Backlog',
                'To Do',
                'In Progress',
                'Code Review',
                'Testing',
                'Done',
                'Sprint 2 Planning'
            ]),
            'project_id' => Project::factory(),
        ];
    }
}
