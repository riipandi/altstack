<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthenticateController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// API index endpoint
Route::get('/', function (Request $request) {
    return response()->json(['message' => 'This is '.config('app.name').' API endpoint'], 200);
});

// Get Sanctum API Token.
Route::post('/sanctum/token', [AuthenticateController::class, 'generateToken']);

// Group routes yang perlu authorizaton...
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

// Fallback response.
Route::fallback(function(){
    return response()->json(['message' => 'Not Found!'], 404);
});
