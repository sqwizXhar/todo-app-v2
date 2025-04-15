<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login'])->name('user.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');
    Route::apiResources([
        'tasks' => \App\Http\Controllers\Api\TaskController::class,
    ]);
});
