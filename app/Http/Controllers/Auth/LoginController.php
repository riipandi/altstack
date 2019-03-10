<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'identity' => 'required',
            'password' => 'required',
        ]);

        $identity  = $request->input('identity');
        $remember  = $request->input('remember');
        $loginType = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$loginType => $identity]);

        if (auth()->attempt($request->only($loginType, 'password'), $remember)) {
            return redirect()
                ->intended($this->redirectPath())
                ->with(['info' => 'Welcome back ' . auth()->user()->first_name]);
        }

        return redirect()->back()
            ->withInput()
            ->withErrors([
                'identity' => __('These credentials do not match our records.'),
            ]);
    }

    public function logout(Request $request)
    {
        if (!auth()->check()) {
            return redirect(route('login'))->with(['warning' => 'You have not logged in before!']);
        }
        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect(route('login'))->with(['success' => 'You\'ve been logged out.']);
    }
}
