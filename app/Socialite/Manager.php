<?php

namespace App\Socialite;

use Laravel\Socialite\SocialiteManager;

class Manager extends SocialiteManager
{
    /**
     * Create an instance of the uid driver.
     */
    public function createUidDriver()
    {
        $config = $this->app['config']['services.uid'];

        return $this->buildProvider(UidProvider::class, $config);
    }
}
