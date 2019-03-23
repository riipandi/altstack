<?php

namespace App\Http\Controllers\Auth;

use App\Handler\SocialiteHandler;
use App\Http\Controllers\Controller;
use Socialite;

class SocialAuthController extends Controller
{
    /**
     * Create a redirect method to twitter api.
     *
     * @return void
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Create a redirect method to provider.
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
     * @return callable URL from twitter
     */
    public function handleProviderCallback($provider, SocialiteHandler $service)
    {
        try {
            $state = Socialite::driver($provider)->user();
            $user = $service->createOrGetUser($state, $provider);
            auth()->login($user);
        } catch (\Exception $e) {
            if (config('app.debug') == true) {
                $msg = $e->getMessage();
            } else {
                $msg = 'Something wrong!';
            }
            return redirect('login')->with('error', $msg);
        }

        return redirect()
            ->to('dashboard')
            ->with('info', 'Welcome back '.auth()->user()->first_name);
    }
}
