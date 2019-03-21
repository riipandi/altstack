<?php

namespace App\Providers;

use Appstract\Options\Option;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Client;
use Laravel\Passport\Passport;
use Ulid\Ulid;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Passport::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Change primary key field type for Passport.
         */
        Client::creating(function (Client $client) {
            $client->incrementing = false;
            $client->id = (string) Ulid::generate(true);
        });

        Client::retrieved(function (Client $client) {
            $client->incrementing = false;
        });

        /**
         * Change primary key field type for Appstract Options.
         */
        Option::creating(function (Option $option) {
            $option->incrementing = false;
            $option->id = (string) Ulid::generate();
        });

        Option::retrieved(function (Option $option) {
            $option->incrementing = false;
        });
    }
}
