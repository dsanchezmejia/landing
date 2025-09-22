<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/landing', function (Request $request) {
    return view('landing::landing', [
        'login_url' => config('landing.login_url'),
        'title' => 'Welcome to Landing Page'
    ]);
})->name('landing');
