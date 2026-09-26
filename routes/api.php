<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Project\ProjectController;
use App\Http\Controllers\Api\Project\SectionController;
use App\Http\Controllers\Api\Project\TaskController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {

    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    Route::middleware('auth:sanctum')->group(function () {

        Route::get('/me', [AuthController::class, 'me'])->name('me');

        Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
        Route::get('/projects/{project}/sections', [SectionController::class, 'index'])->name('sections.index');
        Route::get('/sections/{section}/tasks', [TaskController::class, 'index'])->name('tasks.index');
    });
});
