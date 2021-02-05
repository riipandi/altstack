<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticateController extends Controller
{
    // Generate Sanctum API Token.
    public function login(Request $request)
    {
        $request->validate([
            'identity'    => 'required|string',
            'password'    => 'required',
            'device_name' => 'required',
        ]);

        $fieldType = filter_var($request->identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $user = User::where($fieldType, $request->identity)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'identity' => ['The provided credentials are incorrect.'],
            ]);
        }

        $plainToken = $user->createToken($request->device_name)->plainTextToken;

        return response()->json(['accessToken' => $plainToken], 200);
    }

    // End user session.
    public function logout(Request $request)
    {
        // Revoke a specific user token
        // $user->tokens()->where('id', $id)->delete();
        if ($token = $request->bearerToken()) {
            $model = Sanctum::$personalAccessTokenModel;
            $accessToken = $model::findToken($token);
            $accessToken->delete();
        }

        return response()->json(['message' => 'User has been deauthorized!'], 200);
    }
}
