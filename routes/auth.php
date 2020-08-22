<?php

/*
|-------------------------------------------------------------------------------------------------------------
| Authentication Routes
|-------------------------------------------------------------------------------------------------------------
*/

Route::redirect('/', '/auth/login', 302)->name('auth');

// Login routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');

// Logout routes...
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');

// Email verification...
Route::get('verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('resend-verification', 'Auth\VerificationController@resend')->name('verification.resend');

// Reset user password...
Route::get('resetpass', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('resetpass/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('resetpass', 'Auth\ResetPasswordController@reset')->name('password.update');

// Password confirmation...
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm')->name('password.confirm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

// Two factor authentication...
// Route::get('twofactor', 'Auth\TwoFactorController@index')->name('login.twofactor');
// Route::post('twofactor', 'Auth\TwoFactorController@verify')->name('login.twofactor.verify');

// Socialite route must be placed in the bottom.
// Route::get('{provider}', 'Auth\SocialController@redirectToProvider')->name('auth.social');
// Route::get('{provider}/callback', 'Auth\SocialController@handleProviderCallback')->name('auth.social.callback');
