<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;

class LogoutResponse implements LogoutResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        // if (! auth()->check()) {
        //     return redirect()->route('login')->withStatus('You are not logged in!');
        // }

        return redirect()->route('login')->withStatus('You are already logged out!');
    }
}
