<?php

namespace App\Ai\Tools;

use App\Models\Project\Task;
use App\Models\User\User;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;

class GetMyTasksTool implements Tool
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Get the description of the tool's purpose.
     */
    public function description(): Stringable|string
    {
        return 'A description of the tool.';
    }

    /**
     * Execute the tool.
     */
    public function handle(Request $request): Stringable|string
    {
        $status = $request['status'] ?? null;
        $priority = $request['priority'] ?? null;
        $project = $request['project'] ?? null;

        $tasks = Task::with([
            'section.project',
            'assignee'
        ])
            ->where('assignee_id', $this->user->id)
            ->when($status, function ($q) use ($status) {
                $q->where('status', $status);
            })
            ->when($priority, function ($q) use ($priority) {
                $q->where('priority', $priority);
            })
            ->when($project, function ($q) use ($project) {
                $q->whereHas('section.project', function ($qu) use ($project) {
                    $qu->whereLike('name', "%$project%");
                });
            })
            ->get();

        return $tasks->toJson();
    }

    /**
     * Get the tool's schema definition.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'status' => $schema->string()->description(
                'Filter tasks by status.'
            ),

            'priority' => $schema->string()->description(
                'Filter tasks by priority'
            ),

            'project' => $schema->string()
                ->description('Filter tasks by project name.'),
        ];
    }
}
