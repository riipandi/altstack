<?php

/*
|--------------------------------------------------------------------------
| Front page routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'WelcomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Backend routes
|--------------------------------------------------------------------------
*/
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('updates', function () {
    return view('updates');
})->middleware('auth')->name('app.updates');


/*
|--------------------------------------------------------------------------
| User account routes
|--------------------------------------------------------------------------
*/
Route::get('settings/account', 'User\AccountController@index')->name('user.account');
Route::post('settings/account', 'User\AccountController@update')->name('user.account');
