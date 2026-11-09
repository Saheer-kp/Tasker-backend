<?php

namespace App\Http\Controllers\Ai;

use App\Ai\Agents\GeminiAssistant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ai\AiChatRequest;
use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Ai\Enums\Lab;


class AiController extends Controller
{
    public function chat(AiChatRequest $request)
    {
        try {
            return (new GeminiAssistant($request->user()))->stream(
                $request->validated('prompt'),
                provider: Lab::Gemini
            );
        } catch (ConnectionException $e) {

            Log::error('Gemini connection failed', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Unable to connect to AI service. Please try again.',
            ], 503);
        }
         catch (Exception $e) {

            Log::error('AI Excpection', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Unable to connect to AI service. Please try again.',
            ], 503);
        }
    }
}
