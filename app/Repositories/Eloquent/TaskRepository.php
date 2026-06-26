<?php

namespace App\Repositories\Eloquent;

use App\Models\Project\Section;
use App\Models\Project\Task;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    public function createTask(array $data)
    {
        return Task::create($data);
    }

    public function getTasksBySection(Section $section, int $perPage = 15)
    {
        return $section->tasks()
            ->with('assignee')
            ->orderBy('id', 'asc')
            ->cursorPaginate($perPage);
    }

    public function updateStatus(int $taskId, string $status)
    {
        $task = Task::findOrFail($taskId);
        $task->update(['status' => $status]);
        return $task;
    }

    public function reassignTask(int $taskId, int $assigneeId)
    {
        $task = Task::findOrFail($taskId);
        $task->update(['assignee_id' => $assigneeId]);
        return $task;
    }
}