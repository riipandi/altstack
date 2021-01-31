<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createUser('Super Admin', 'admin', 'admin@example.com', true);
    }

    private function createUser($name, $username, $email, $verified = false)
    {
        $user = User::create([
            'name'           => $name,
            'username'       => $username,
            'email'          => $email,
            'password'       => Hash::make('secretpwd'),
            'remember_token' => Str::random(12),
        ]);

        if ($verified) {
            $user->email_verified_at = now();
        }

        return $user->save();
    }
}
