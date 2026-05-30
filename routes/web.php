<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        "greeting" => "Hello",
        "user" => request('user','World')
    ]);
});
Route::view('/dashboard', 'dashboard');
Route::view('/about', 'about');
Route::view('/projects', 'projects');
