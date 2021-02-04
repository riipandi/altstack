<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Welcome page.
Route::view('/', 'welcome')->name('landing');

// Authenticated routes...
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('user/profile', 'profile.index')->name('user.profile');

});

// Logout with get method and redirect authentication route using prefix.
Route::get('auth/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::redirect('logout', '/auth/logout', 302);
Route::redirect('forgot-password', '/auth/forgot-password', 302);
Route::redirect('register', '/auth/register', 302);
Route::redirect('login', '/auth/login', 302);
