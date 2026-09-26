<?php

use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Requests\Auth\RegisterRequest;

test('register method creates a user and returns token', function () {
    $request = validatedRequest(RegisterRequest::class, [
        'name' => 'Shr',
        'email' => 'shr@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123'
    ]);

    $controller = app(RegisterController::class);
    $response = $controller->register($request);
    $data = $response->getData(true);

    expect($response->getStatusCode())->toBe(201)
        ->and($data['success'])->toBe(true)
        ->and($data)->toHaveKey('token');

    $this->assertDatabaseHas('users', [
        'email' => 'shr@example.com'
    ]);
});
