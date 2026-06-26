<?php

use App\Http\Controllers\Api\Project\ProjectController;
use App\Http\Controllers\Api\Project\SectionController;
use App\Http\Controllers\Api\Project\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    // Route::middleware('auth:sanctum')->group(function () {
    Route::get('/projects', [ProjectController::class, 'index']);

    Route::get('/projects/{project}/sections', [SectionController::class, 'index']);

    Route::get('/sections/{section}/tasks', [TaskController::class, 'index'])->name('tasks.index');
    // });
});
