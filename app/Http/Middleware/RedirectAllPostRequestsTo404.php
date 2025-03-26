<?php
namespace App\Http\Middleware;

use Closure;

class RedirectAllPostRequestsTo404
{
    public function handle($request, Closure $next)
    {
        if ($request->isMethod('post')) {
            return abort(404);
        }

        return $next($request);
    }
}
