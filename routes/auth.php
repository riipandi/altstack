<?php

/**
 * Authentication routes.
 */
Auth::routes([
    'register' => env('ENABLE_REGISTRATION', false),
    'reset'    => env('ENABLE_PASSWD_RESET', true),
    'verify'   => true,
]);

Route::get('auth', 'Auth\SocialAuthController@index')->name('auth');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
