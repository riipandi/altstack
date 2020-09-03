<?php

/*
|-------------------------------------------------------------------------------------------------------------
| Authentication Routes
|-------------------------------------------------------------------------------------------------------------
*/

Route::redirect('/', '/auth/login', 302)->name('auth');

Route::namespace('Auth')->group(function () {

    // Login routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login');

    // Logout routes...
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Registration routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register')->name('register');

    // Email verification...
    Route::get('verify', 'VerificationController@show')->name('verification.notice');
    Route::get('verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify');
    Route::post('resend-verification', 'VerificationController@resend')->name('verification.resend');

    // Reset user password...
    Route::get('resetpass', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::get('resetpass/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('resetpass', 'ResetPasswordController@reset')->name('password.update');

    // Password confirmation...
    Route::get('password/confirm', 'ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    Route::post('password/confirm', 'ConfirmPasswordController@confirm')->name('password.confirm');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    // Two factor authentication...
    // Route::get('twofactor', 'TwoFactorController@index')->name('login.twofactor');
    // Route::post('twofactor', 'TwoFactorController@verify')->name('login.twofactor.verify');

    // Socialite route must be placed in the bottom.
    // Route::get('{provider}', 'SocialController@redirectToProvider')->name('auth.social');
    // Route::get('{provider}/callback', 'SocialController@handleProviderCallback')->name('auth.social.callback');
});
