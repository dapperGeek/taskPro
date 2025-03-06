<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/create', [ProjectController::class, 'create']);
Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
