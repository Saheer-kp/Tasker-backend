<?php

namespace Database\Factories\Project;

use App\Models\Project\Project;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
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
                'Mobile App Development',
                'E-Commerce Website',
                'Marketing Campaign',
                'HR Portal Redesign'
            ]),
            'user_id' => User::factory(),
        ];
    }
}
