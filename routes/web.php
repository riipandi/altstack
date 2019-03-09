<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('auth')->name('logs');
