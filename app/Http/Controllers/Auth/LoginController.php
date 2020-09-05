<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $maxAttempts = 3;  // Default is 5
    protected $decayMinutes = 2; // Default is 1

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
     * Login with username or email.
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'identity' => 'required',
            'password' => 'required',
            // 'g-recaptcha-response' => 'required|captcha',
        ]);

        $identity = $request->input('identity');
        $remember = $request->input('remember');
        $loginType = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$loginType => $identity]);

        if (auth()->attempt($request->only($loginType, 'password'), $remember)) {
            $returnUrl = ! empty($request->input('next')) ? $request->input('next') : $this->redirectPath();

            return redirect($returnUrl)->withSuccess('Welcome back '.auth()->user()->first_name);
        }

        return redirect()->back()->withInput()->withErrors(['identity' => __('These credentials do not match our records.')]);
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
        $returnUrl = ! empty($request->input('next')) ? $request->input('next') : $this->redirectPath();

        return redirect($returnUrl)->withSuccess('Welcome back '.$user->name.'!');
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
