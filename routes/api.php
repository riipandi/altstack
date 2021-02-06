<?php

use App\Http\Controllers\ApiControllers\AuthenticateController;
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

// Authentication via API using Laravel Sanctum.
Route::post('/auth/login', [AuthenticateController::class, 'login']);
Route::post('/auth/logout', [AuthenticateController::class, 'logout'])
    ->missing(function (Request $request) {
        return response()->json(['message' => 'Failed to deauthorize user!'], 404);
    });

// Group routes yang perlu authorizaton...
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

// Fallback response.
Route::fallback(function () {
    return response()->json(['message' => 'Not Found!'], 404);
});
