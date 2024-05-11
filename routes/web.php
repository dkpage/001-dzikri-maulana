<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.welcome');
});
Route::get('/login', function () {
    return view('pages.login');
});

// ADMIN ROUTES
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('pages.admin.dashboard');
    })->name('dashboard');

    Route::get('/outlets', function () {
        return view('pages.admin.outlets_data');
    })->name('outlets_data');

    Route::get('/reports', function () {
        return view('pages.admin.report_data');
    })->name('report_data');

    Route::get('/users', function () {
        return view('pages.admin.users_data');
    })->name('users_data');
});

// USER ROUTES
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', function () {
        return view('pages.user.home');
    })->name('home');

    Route::get('/profile', function () {
        return view('pages.user.profile');
    })->name('profile');

    Route::get('/reporting', function () {
        return view('pages.user.report_form');
    })->name('report_form');

    Route::get('/reports', function () {
        return view('pages.user.reports');
    })->name('reports');
});
