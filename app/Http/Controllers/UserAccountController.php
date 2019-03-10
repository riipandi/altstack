<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.account');
    }

    /**
     * Update user account.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        return redirect()->back()->with(['info' => 'Ok!']);
    }
}
