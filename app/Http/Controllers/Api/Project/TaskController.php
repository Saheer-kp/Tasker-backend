<?php

namespace App\Http\Controllers\Api\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\Project\TaskResource;
use App\Models\Project\Section;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(private TaskRepositoryInterface $taskRepository) {}

    public function index(Section $section)
    {
        $tasks = $this->taskRepository->getTasksBySection($section, 15);
        return TaskResource::collection($tasks);
    }
}
