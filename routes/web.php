<?php

Route::get('/', 'WelcomeController@index')->name('home');

// Authentication routes.
Auth::routes([
    'register' => env('ENABLE_REGISTRATION', true),
    'reset'    => env('ENABLE_PASSWD_RESET', true),
    'verify'   => true,
]);
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('updates', function () {
    return view('updates');
})->name('app.updates');

// User account.
Route::get('settings/account', 'User\AccountController@index')->name('user.account');
Route::post('settings/account', 'User\AccountController@update')->name('user.account');

// Auth with social account.
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');
