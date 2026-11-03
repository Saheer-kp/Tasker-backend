<?php

use App\Models\User\User;
use App\Ai\Agents\GeminiAssistant;


it('returns unauthorized for unauthenticated users', function () {
    $response = $this->postJson('/api/v1/ai-chat', [
        'message' => 'Show my tasks',
    ]);

    $response->assertUnauthorized();
});

it('returns validation error when message is missing', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)
        ->postJson('/api/v1/ai-chat', []);

    $response->assertUnprocessable()
        ->assertJsonValidationErrors(['prompt']);
});


it('returns AI response for authenticated user', function () {

    GeminiAssistant::fake([
        'Here are your completed tasks.',
    ]);

    $user = User::factory()->create();

    $response = $this->actingAs($user)
        ->postJson('/api/v1/ai-chat', [
            'prompt' => 'Show my completed tasks',
        ]);

    $response->assertOk()
        ->assertJson([
            'message' => 'Here are your completed tasks.',
        ]);

    GeminiAssistant::assertPrompted('Show my completed tasks');
});
