<?php

namespace App\Http\Controllers\Api\Project;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(private ProjectRepositoryInterface $projectRepository) {}

    public function index(Request $request)
    {
        $projects = $this->projectRepository->getUserProjects(1);
        return response()->json(['data' => $projects]);
    }

    public function show($id)
    {
        $project = $this->projectRepository->getProjectWithSections($id);
        return response()->json(['data' => $project]);
    }
}
