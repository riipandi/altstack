<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo()
    {
        return route('home');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email'    => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
    }

    /**
     * Set the logout redirect path.
     *
     * @return void
     */
    public function logout(Request $request)
    {
        if (! $this->guard('web')->check()) {
            return redirect(route('login'))->withWarning('You have not logged in before!');
        }

        $this->guard('web')->logout();
        $request->session()->invalidate();

        return redirect()->route('login')->withSuccess('You\'ve been logged out!');
    }

    public function authenticated(Request $request, $user)
    {
        return redirect()
            ->intended($this->redirectPath())
            ->withSuccess('Welcome back '.$user->name.'!');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('web');
    }
}
