<?php

use Illuminate\Support\Facades\Route;

Route::post('task',[\App\Http\Controllers\Api\TaskController::class, 'store'])->name('user.task');

Route::get('tasks',[\App\Http\Controllers\Api\TaskController::class, 'index'])->name('user.tasks');
