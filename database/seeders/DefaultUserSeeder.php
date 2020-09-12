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
        User::create([
            'name'              => 'Admin Sistem',
            'username'          => 'admin',
            'email'             => 'admin@example.org',
            'password'          => Hash::make('passw0rd'),
            'remember_token'    => Str::random(12),
            'email_verified_at' => now(),
        ]);
    }
}
