<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->isA('student')) {
                return redirect('/profile');
            }
            if (Auth::user()->isA('company')) {
                return redirect('/profile');
            }
            if (Auth::user()->isA('institution')) {
                return redirect('/validators');
            }
            if (Auth::user()->isA('validator')) {
                return redirect('/validate');
            }
            if (Auth::user()->userable_type == '') {
                return redirect('/setup');
            }
            return redirect('/');
        }

        return $next($request);
    }
}
