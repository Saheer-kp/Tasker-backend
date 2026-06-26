<?php

namespace App\Repositories\Interfaces;

interface ProjectRepositoryInterface
{
    public function getUserProjects(int $userId);
    public function createProject(array $data);
    public function getProjectWithSections(int $projectId);
}