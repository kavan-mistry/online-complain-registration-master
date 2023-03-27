<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotReturn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('cid'))
            return redirect()->back();
        elseif (session()->has('department'))
            return redirect()->back();
        elseif (session()->has('admin_id'))
            return redirect()->back();
        else
            return $next($request);
    }
}
