<?php

use App\Ai\Tools\GetMyTasksTool;
use App\Models\Project\Task;
use App\Models\User\User;
use Laravel\Ai\Tools\Request;
use App\Models\Project\Project;
use App\Models\Project\Section;

it('returns only tasks matching the requested status', function () {

    $user = User::factory()->create();

    Task::factory()->create([
        'assignee_id' => $user->id,
        'status' => 'Completed',
    ]);

    Task::factory()->create([
        'assignee_id' => $user->id,
        'status' => 'Pending',
    ]);

    $tool = new GetMyTasksTool($user);

    $request = new Request([
        'status' => 'Completed',
    ]);

    $result = json_decode($tool->handle($request), true);

    expect($result)->toHaveCount(1)
        ->and($result[0]['status'])->toBe('Completed');
});


it('returns only tasks matching the requested priority', function () {

    $user = User::factory()->create();

    Task::factory()->create([
        'assignee_id' => $user->id,
        'priority' => 'High',
    ]);

    Task::factory()->create([
        'assignee_id' => $user->id,
        'priority' => 'Low',
    ]);

    $tool = new GetMyTasksTool($user);

    $request = new Request([
        'priority' => 'High',
    ]);

    $result = json_decode($tool->handle($request), true);

    expect($result)->toHaveCount(1)
        ->and($result[0]['priority'])->toBe('High');
});




it('returns only tasks belonging to the requested project', function () {

    $user = User::factory()->create();

    $project1 = Project::factory()->create();
    $project2 = Project::factory()->create();

    $section1 = Section::factory()->create([
        'project_id' => $project1->id,
    ]);

    $section2 = Section::factory()->create([
        'project_id' => $project2->id,
    ]);

    Task::factory()->create([
        'section_id' => $section1->id,
        'assignee_id' => $user->id,
    ]);

    Task::factory()->create([
        'section_id' => $section2->id,
        'assignee_id' => $user->id,
    ]);

    $tool = new GetMyTasksTool($user);

    $request = new Request([
        'project' => $project1->name,
    ]);

    $result = json_decode($tool->handle($request), true);

    expect($result)->toHaveCount(1)
        ->and($result[0]['section']['project']['id'])->toBe($project1->id);
});
