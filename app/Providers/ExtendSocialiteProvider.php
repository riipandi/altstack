<?php

namespace App\Providers;

use App\Socialite\Manager;
use Laravel\Socialite\Contracts\Factory;
use Laravel\Socialite\SocialiteServiceProvider;

class ExtendSocialiteProvider extends SocialiteServiceProvider
{
    public function register()
    {
        $this->app->singleton(Factory::class, function ($app) {
            return new Manager($app);
        });
    }

    public function provides()
    {
        return [Factory::class];
    }
}
