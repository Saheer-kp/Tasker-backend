<?php

namespace App\Http\Controllers\Api\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\Project\SectionResource;
use App\Models\Project\Project;
use App\Repositories\Interfaces\SectionRepositoryInterface;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function __construct(private SectionRepositoryInterface $sectionRepository) {}

    public function index(Project $project)
    {
        $sections = $this->sectionRepository->getSectionsByProject($project, 5); // ഒരു തവണ 5 സെക്ഷനുകൾ വീതം
        return SectionResource::collection($sections);
    }
}
