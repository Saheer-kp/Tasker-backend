<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(protected UserRepositoryInterface $userRepository) {}

    public function register(RegisterRequest $request)
    {
        $user = $this->userRepository->create($request->validated());

        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->successResponse([
            'user' => $user,
            'token' => $token,
            'token_type' => 'Bearer'
        ], 'User registered successfully', 201);
    }
}
