<?php

namespace App\Ai\Agents;

use App\Ai\Tools\GetMyTasksTool;
use App\Models\User\User;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasTools;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Messages\Message;
use Laravel\Ai\Promptable;
use Stringable;

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
        - Help users manage their tasks.
        - Break complex work into smaller tasks.
        - Suggest task priorities.
        - Provide clear and concise responses.
        - When users ask about their tasks, use the GetMyTasksTool.
        - Never assume task details without retrieving them from the tool.

        Always respond in a friendly and professional manner.';
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
            new GetMyTasksTool($this->user)
        ];
    }
}
