<?php

namespace App\Repositories\Interfaces;

use App\Models\Project\Project;

interface SectionRepositoryInterface
{
    public function getSectionsByProject(Project $project, int $perPage = 5);
}