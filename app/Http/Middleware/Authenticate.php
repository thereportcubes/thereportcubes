<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('TRC/11');
        }
        
        if ($request->user()->hasRole('admin')) {
            return redirect('admin/dashboard');
        }
        else if ($request->user()->hasRole('member')) {
            return redirect()->route('user/dashboard');
        }
        
    }
}
