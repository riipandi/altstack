<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PasswordHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
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
    public function update(Request $request)
    {
        $id = auth()->user()->id;
        $ulid = auth()->user()->ulid;

        $request->validate([
            'name'        => 'required|string|max:255',
            'username'    => 'required|alpha_dash|min:4|max:40|unique:users,username,'.$id,
            'email'       => 'required|string|email|max:255|unique:users,email,'.$id,
            'oldpassword' => 'required|string',
        ]);

        $oldPassword = $request->get('oldpassword');

        $user = User::where('ulid', '=', $ulid)->firstOrFail();
        if (!Hash::check($oldPassword, $user->password)) {
            return back()->with('warning', 'Invalid current password!');
        }

        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');

        if ($request->get('newpassword')) {
            $newPassword = $request->get('newpassword');
            $request->validate(['newpassword' => 'string|min:8|confirmed']);

            // compare with old password
            if (strcmp($oldPassword, $newPassword) == 0) {
                return redirect()->back()
                    ->with('warning', 'Please choose a different password with your current password!');
            }

            // check password history
            $passwordHistories = $user->passwordHistories()->take(9)->get();
            foreach ($passwordHistories as $ph) {
                if (Hash::check($newPassword, $ph->password)) {
                    return redirect()->back()
                        ->with('error', 'Please choose a different password with any of your old passwords!');
                }
            }

            // change user password
            $user->password = $newPassword;

            // entry into password history
            $ph = PasswordHistory::create([
                'user_id'  => $user->id,
                'password' => $newPassword,
            ]);
        }

        $user->save();

        return back()->with('success', 'User profile has been updated');
    }
}
