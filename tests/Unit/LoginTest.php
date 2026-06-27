<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;


test('validation rules for login request work as expected', function (array $data, bool $shouldPass) {
    // creating login request instance
    $request = new LoginRequest();

    // 2. checking rules using validator
    $validator = Validator::make($data, $request->rules());

    // 3. ensure the response as expected
    expect($validator->passes())->toBe($shouldPass);
})->with([
    // [ data to be test to  (true/false) ]
    'valid email and password' => [
        ['email' => 'amal@example.com', 'password' => 'password123'],
        true
    ],
    'missing email' => [
        ['password' => 'password123'],
        false
    ],
    'invalid email format' => [
        ['email' => 'not-an-email', 'password' => 'password123'],
        false
    ],
    'missing password' => [
        ['email' => 'amal@example.com'],
        false
    ],
    'short password (less than 6 characters)' => [
        ['email' => 'amal@example.com', 'password' => '123'],
        false
    ],
]);


test('login method returns token for valid credentials', function () {
    User::factory()->create([
        'email' => 'shr@example.com',
        'password' => Hash::make('secret123'),
    ]);

    $request = validatedRequest(LoginRequest::class, [
        'email' => 'shr@example.com',
        'password' => 'secret123'
    ]);

    $controller = new AuthController();
    $response = $controller->login($request);

    $data = $response->getData(true);

    expect($data)->toHaveKey('token')
        ->and($data['user']['email'])->toBe('shr@example.com')
        ->and($data['token_type'])->toBe('Bearer');
});

test('login method throws validation exception for invalid credentials', function () {
    User::factory()->create([
        'email' => 'shr@example.com',
        'password' => Hash::make('secret123'),
    ]);

    $request = validatedRequest(LoginRequest::class, [
        'email' => 'shr@example.com',
        'password' => 'wrong-password'
    ]);

    $controller = new AuthController();

    $response = $controller->login($request);

    $data = $response->getData(true);

    expect($response->getStatusCode())->toBe(401)
        ->and($data['success'])->toBe(false)
        ->and($data['message'])->toBe('Invalid credentials');
});
