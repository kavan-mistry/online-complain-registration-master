<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Complain;
use Symfony\Component\HttpFoundation\Response;

class WaterDepartmentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->email == 'water@gmail.com') {
            // $complaints = Complain::where('dept', 'water')->get();
            // $data = compact('complaints');
            $de = "water";
            // echo '<pre>';
            // print_r($data);
            $url = url('/deptlogin/deptdash') ."/". $de;
            return redirect($url);
        }
        elseif($request->email == 'electricity@gmail.com'){
            $de = "electricity";
            $url = url('/deptlogin/deptdash') ."/". $de;
            return redirect($url);
        }
        elseif($request->email == 'disaster@gmail.com'){
            $de = "disaster";
            $url = url('/deptlogin/deptdash') ."/". $de;
            return redirect($url);
        }
        else{
            return redirect('/deptlogin');
        }
        return $next($request);
    }
}
