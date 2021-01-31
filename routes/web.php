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

    // Logout using get method.
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
