<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// API index endpoint
Route::get('/', function (Request $request) {
    return response()->json(['message' => 'This is '.config('app.name').' API endpoint'], 200);
});

// Group routes yang perlu authorizaton...
Route::middleware('auth:api')->group(function () {
    Route::get('user', function (Request $request) {
        return $request->user();
    });
});
