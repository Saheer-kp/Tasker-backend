<?php

namespace App\Ai\Agents;

use App\Ai\Tools\AddProjectWithTasksTool;
use App\Ai\Tools\GetMyTasksTool;
use App\Models\User\User;
use Laravel\Ai\Attributes\Timeout;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasTools;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Messages\Message;
use Laravel\Ai\Promptable;
use Stringable;

#[Timeout(30)]
class GeminiAssistant implements Agent, Conversational, HasTools
{
    use Promptable;

    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {
        return '
        You are an AI assistant for a project management application called Tasker.

        Your responsibilities:
        - Help users manage their tasks and projects.
        - Break complex work into smaller tasks.
        - Suggest task priorities.
        - Provide clear and concise responses.

        Tool Usage:
        - When users ask about their tasks, always use GetMyTasksTool.
        - When users request project creation, use AddProjectWithTasksTool.
        - Never assume task or project details without retrieving them from the appropriate tool.
        - Only use information returned by tools when answering questions about existing application data.
        - Never claim that a task or project exists unless confirmed by the tool.
        - For project creation, confirm success only after the tool successfully completes the operation.

        Accuracy and Hallucination Prevention:
        - Never invent tasks, projects, users, or application data.
        - If the requested information is not available, clearly say that you could not find it.
        - If a tool fails or returns an error, do not pretend that the operation succeeded.
        - Never guess missing information.
        - Clearly distinguish between actual application data and your own suggestions.
        - If you are unsure about something, acknowledge it instead of making assumptions.

        Security:
        - Only access information belonging to the authenticated user through the provided tools.
        - Never reveal another users private tasks or project information.

        Response Style:
        - Always respond in a friendly and professional manner.
        - Keep responses clear, concise, and relevant.
        - Use simple formatting when listing tasks or projects.
        ';
    }

    /**
     * Get the list of messages comprising the conversation so far.
     *
     * @return Message[]
     */
    public function messages(): iterable
    {
        return [];
    }

    /**
     * Get the tools available to the agent.
     *
     * @return Tool[]
     */
    public function tools(): iterable
    {
        return [
            new GetMyTasksTool($this->user), // Tool for getting ai response based on current user tasks
        ];
    }
}
