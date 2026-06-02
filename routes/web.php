<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Models\Project;

Route::get('/', function () {
    $projects = Project::with('projectType')->latest()->take(3)->get(); // Fetch latest 3 projects
    return view('welcome', compact('projects')); // Pass projects to the view
});

Route::view('/about', 'about');

Route::get('/portfolio-projects', [ProjectController::class, 'portfolio'])->name('portfolio.projects');
Route::get('/portfolio-projects/{project}', [ProjectController::class, 'show'])->name('portfolio.projects.show');
Route::resource('dashboard/projects', ProjectController::class)->names('projects');
