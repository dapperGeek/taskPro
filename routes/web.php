<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create']);
Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/edit/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/update/{id}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');

#Tasks
Route::get('/tasks', [ProjectController::class, 'index']);
Route::get('/tasks/create', [ProjectController::class, 'create']);
Route::post('/tasks/store', [ProjectController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{id}', [ProjectController::class, 'show'])->name('tasks.show');
Route::get('/tasks/edit/{id}', [ProjectController::class, 'edit'])->name('tasks.edit');
Route::delete('/tasks/{id}', [ProjectController::class, 'destroy'])->name('tasks.destroy');
