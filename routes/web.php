<?php

Route::get('/', 'DashboardController@index')->name('dashboard');

Auth::routes([
    'register' => env('ENABLE_REGISTRATION', true),
    'reset'    => env('ENABLE_PASSWD_RESET', true),
    'verify'   => true,
]);

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('auth')->name('logs');

Route::get('updates', function () {
    return view('updates');
})->name('app.updates');

// User account.
Route::get('settings/account', 'UserAccountController@index')->name('user.account');
Route::post('settings/account', 'UserAccountController@update')->name('user.account');
