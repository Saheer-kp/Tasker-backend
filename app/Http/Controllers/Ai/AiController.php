<?php

namespace App\Http\Controllers\Ai;

use App\Ai\Agents\GeminiAssistant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ai\AiChatRequest;
use Illuminate\Http\Request;
use Laravel\Ai\Enums\Lab;


class AiController extends Controller
{
    public function chat(AiChatRequest $request)
    {
        return (new GeminiAssistant($request->user()))->stream(
            $request->validated('prompt'),
            provider: Lab::Gemini
        );
    }
}
