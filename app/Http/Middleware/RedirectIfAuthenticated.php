<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        // dd($guards);

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard === 'admin') {
                    return redirect()->route('admin.dashboard');
                }

                return redirect()->route('user.home');
            }
        }

        // [Start Request] → [Middleware A] → [Middleware B] → [Controller]
        // this how the return statement below is working
        // actually teh redirection to login page is controlled by the controller not this middleware class
        // which controller is to be accessed is known by the route defined
        return $next($request);
    }
}
