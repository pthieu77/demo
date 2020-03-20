<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AuthenticateAdmin
{
    public function handle($request, Closure $next)
    {

        if (Auth::check() && Auth::user()->isAdmin())
        {
            return $next($request);
        }

        return redirect()->route('admin.page.auth.login');

    }
}
