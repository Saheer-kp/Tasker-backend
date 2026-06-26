<?php

namespace Database\Seeders;

use App\Models\Project\Project;
use App\Models\Project\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // നമ്മൾ ഉണ്ടാക്കിയ മെയിൻ പ്രൊജക്റ്റ് എടുക്കുന്നു
        $project = Project::where('name', 'Asana Clone Project')->first();

        if ($project) {
            $sections = [
                'Project Backlog',
                'Sprint Planning',
                'To Do',
                'Design Phase',
                'Frontend Dev',
                'Backend API',
                'QA Testing',
                'Bug Fixing',
                'Code Review',
                'DevOps & Deployment',
                'Completed Tasks',
                'Future Ideas'
            ];

            foreach ($sections as $sectionName) {
                Section::create([
                    'name' => $sectionName,
                    'project_id' => $project->id,
                ]);
            }
        }
    }
}
