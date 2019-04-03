<?php

/**
 * Authentication routes.
 */
Auth::routes([
    'register' => env('ENABLE_REGISTRATION', false),
    'reset'    => env('ENABLE_PASSWD_RESET', true),
    'verify'   => true,
]);

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Auth with social account.
Route::get('auth', 'Auth\SocialAuthController@index')->name('auth');
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

// Laravel Passport.
Route::middleware('auth')->get('passport', function () {
    return view('passport');
})->name('passport');
