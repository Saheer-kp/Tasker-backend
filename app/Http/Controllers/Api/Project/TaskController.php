<?php

namespace App\Http\Controllers\Api\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(private TaskRepositoryInterface $taskRepository) {}

    public function index(int $sectionId)
    {
        $tasks = $this->taskRepository->getTasksBySection($sectionId, 15);
        return TaskResource::collection($tasks);
    }
}
