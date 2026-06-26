<?php

namespace App\Repositories\Eloquent;

use App\Models\Project\Project;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Repositories\Interfaces\SectionRepositoryInterface;

class ProjectRepository implements ProjectRepositoryInterface, SectionRepositoryInterface
{
    public function getUserProjects(int $userId)
    {
        return Project::all();
    }

    public function createProject(array $data)
    {
        return Project::create($data);
    }

    public function getProjectWithSections(int $projectId)
    {
        return Project::with('sections')->findOrFail($projectId);
    }

    public function getSectionsByProject(Project $project, int $perPage = 5) {}
}
