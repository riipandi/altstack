<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Str;

class CreateNewUser implements CreatesNewUsers
{
    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     *
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', (new Password)->requireNumeric()->requireUppercase(), 'confirmed'],
            // 'username' => ['required', 'string', 'min:4', 'max:30', 'unique:users', 'alpha_dash'],
        ])->validate();

        return User::create([
            'name'     => $input['name'],
            'email'    => $input['email'],
            'password' => Hash::make($input['password']),
            'username' => self::generateUsername($input['email']),
        ]);
    }

    /**
     * Generate username by user email address.
     */
    protected static function generateUsername($email)
    {
        $newUsername = Str::slug(Str::before($email, '@'), '');
        $unameCheck = User::withTrashed()->whereUsername($newUsername)->first();

        if ($unameCheck) {
            return strtolower($newUsername.Str::random(4));
        }

        return strtolower($newUsername);
    }
}
