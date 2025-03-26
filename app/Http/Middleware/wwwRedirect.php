<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
class wwwRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $host = $request->header('host');
         $request->headers->set('host', '' . $host);
        // if (substr($host, 0, 4) != 'www.') {
        //     $request->headers->set('host', 'www.' . $host);
        //     return redirect($request->path(), 301);
        //    // return Redirect::to($request->path(), 301);
        // }
        return $next($request);
    }
} 
    
