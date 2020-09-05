<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return self::qs_url('login', ['next' => Request::fullUrl()]);
        }
    }

    /**
     * Generate a querystring url for the application.
     *
     * Assumes that you want a URL with a querystring rather than route params
     * (which is what the default url() helper does)
     *
     * @param  string  $path
     * @param  mixed   $qs
     * @param  bool    $secure
     * @return string
     */
    private static function qs_url($path = null, $qs = [], $secure = null)
    {
        $url = app('url')->to(route($path), $secure);
        if (count($qs)) {
            foreach ($qs as $key => $value) {
                $qs[$key] = sprintf('%s=%s', $key, urlencode($value));
            }
            $url = sprintf('%s?%s', $url, implode('&', $qs));
        }

        return $url;
    }
}
