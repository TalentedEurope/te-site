<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use JWTAuth;

class Authenticate
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
        if ($request->has('token')) {
            $user = JWTAuth::parseToken()->authenticate();
            if ($user) {
                $request->session()->put('app', true);
                Auth::login($user);
            }
        }
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        } else {
            if (\Request::route()->getName() != 'getSetup') {
                if (Auth::user()->userable_type == '') {
                    return redirect('/setup');
                }
            }
        }
        return $next($request);
    }
}
