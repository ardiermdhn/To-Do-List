<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::resource('Task', TaskController::class);

Route::get('/search-tasks', [TaskController::class, 'search']);
Route::post('/update/{id}',[TaskController::class,'status'])->name('status');
