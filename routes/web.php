<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DesignWorkController;
use App\Models\Project;

Route::get('/', function () {
    $projects = Project::with('projectType')->latest()->take(3)->get();
    return view('welcome', compact('projects'));
});

Route::view('/about', 'about');

// Public Portfolio Routes
Route::get('/portfolio-projects', [ProjectController::class, 'portfolio'])->name('portfolio.projects');
Route::get('/portfolio-projects/{project}', [ProjectController::class, 'show'])->name('portfolio.projects.show');

Route::get('/creative-works', [DesignWorkController::class, 'portfolio'])->name('portfolio.designs');
Route::get('/creative-works/{designWork}', [DesignWorkController::class, 'show'])->name('portfolio.designs.show');


// 🔒 PROTECTED DASHBOARD ROUTES 🔒
Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard/projects', ProjectController::class)->names('projects');

    Route::resource('dashboard/designs', DesignWorkController::class)->parameters([
        'designs' => 'designWork'
    ])->names('designs');
});

// Laravel Breeze auth routes automatically added here
require __DIR__.'/auth.php';
