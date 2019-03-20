<?php

namespace App\Providers;

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
        Client::creating(function (Client $client) {
            $client->incrementing = false;
            $client->id = (string) Ulid::generate(true);
        });

        Client::retrieved(function (Client $client) {
            $client->incrementing = false;
        });
    }
}
