<?php

namespace App\Repositories\Eloquent;

use App\Models\Project\Project;
use App\Models\Project\Section;
use App\Repositories\Interfaces\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface
{
    public function getSectionsByProject(Project $project, int $perPage = 5)
    {
        return $project->sections()
            ->orderBy('id', 'asc')
            ->cursorPaginate($perPage);
    }
}