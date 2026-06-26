<?php

namespace Database\Seeders;

use App\Models\Project\Section;
use App\Models\Project\Task;
use App\Models\User\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allUsers = User::pluck('id')->toArray();

        $sections = Section::all();

        foreach ($sections as $section) {
            Task::factory()->count(25)->create([
                'section_id' => $section->id,
                'assignee_id' => function () use ($allUsers) {
                    return fake()->optional(0.8)->randomElement($allUsers);
                }
            ]);
        }
    }
}
