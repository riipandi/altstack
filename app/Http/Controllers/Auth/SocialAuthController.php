<?php

namespace App\Http\Controllers\Auth;

use App\Handler\SocialiteHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;

class SocialAuthController extends Controller
{
    /**
     * Create a redirect method to twitter api.
     *
     * @return void
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Return a callback method from twitter api.
     *
     * @return callback URL from twitter
     */
    public function handleProviderCallback($provider, SocialiteHandler $service)
    {
        $user = $service->createOrGetUser(Socialite::driver($provider)->user(), $provider);
        auth()->login($user);
        return redirect()
            ->to('dashboard')
            ->with(['info' => 'Welcome back '.auth()->user()->first_name]);
    }
}
