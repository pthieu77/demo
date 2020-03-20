<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AuthenticateUser
{
    public function handle($request, Closure $next)
    {

        if (Auth::check() && Auth::user()->isUser())
        {
            return $next($request);
        }

        return redirect()->route('user.page.auth.login');

    }
}
