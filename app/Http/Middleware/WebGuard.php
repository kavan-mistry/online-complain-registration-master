<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->has('customer_id'))
            return $next($request);
        elseif(session()->has('dept_id'))
            return $next($request);
        elseif(session()->has('admin_id'))
            return $next($request);
        else
            return redirect('/login');
    }
}
