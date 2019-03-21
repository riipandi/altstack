<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OptionsTableSeeder::class);

        $this->call(PermissionSeeder::class);

        // Create first user.
        $user = new App\Models\User();
        $user->name = 'Admin Sistem';
        $user->username = 'admin';
        $user->password = 'secret';
        $user->email = 'admin@mail.com';
        $user->email_verified_at = now();
        $user->save();

        // Give superadmin to this user.
        $user->assignRole('superadmin');
    }
}
