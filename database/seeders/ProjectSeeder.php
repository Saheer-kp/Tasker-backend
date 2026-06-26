<?php

namespace Database\Seeders;

use App\Models\Project\Project;
use App\Models\User\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mainUser = User::where('email', 'shaheer@example.com')->first();

        if ($mainUser) {
            Project::factory()->create([
                'name' => 'Asana Clone Project',
                'user_id' => $mainUser->id,
            ]);

            Project::factory()->count(2)->create([
                'user_id' => $mainUser->id
            ]);
        }
    }
}
