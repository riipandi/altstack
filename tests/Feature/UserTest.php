<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = new User(['name' => 'Admin Sistem']);
        $this->assertEquals('Admin Sistem', $user->name);
    }
}
