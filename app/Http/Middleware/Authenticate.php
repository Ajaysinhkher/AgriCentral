<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Redirect unauthenticated users.
     */
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login');
            }
            return route('user.login');
        }
        return null;
    }

}


// this class is used to block the unauthenticated users from protected pages