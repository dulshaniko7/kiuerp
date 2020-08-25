<?php

namespace Modules\Admin\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Providers\RouteServiceProvider;

class AdminRedirectIfAuthenticated
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

            if($guard == "admin")
            {
                return redirect()->intended(route('dashboard.home'));
            }
            else
            {
                return redirect(RouteServiceProvider::LOGIN);
            }
        }

        return $next($request);
    }
}