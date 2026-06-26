<?php

namespace App\Repositories\Interfaces;

use App\Models\Project\Section;

interface TaskRepositoryInterface
{
    public function createTask(array $data);

    public function getTasksBySection(Section $section, int $perPage = 15);

    public function updateStatus(int $taskId, string $status);

    public function reassignTask(int $taskId, int $assigneeId);
}