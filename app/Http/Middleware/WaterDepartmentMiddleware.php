<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\department;
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
        $user = department::where('email', $request->input('email'))->get();
        $request->validate(
            [
                'email' => 'email|required',
                'passward' => 'required',
            ]
        );
        if ($request->email == 'water@gmail.com') {
            // $complaints = Complain::where('dept', 'water')->get();
            // $data = compact('complaints');
            $de = "water";
            // echo '<pre>';
            // print_r($data);
            $url = url('/deptlogin/deptdash') ."/". $de;
            if ($user[0]->passward == $request->input('passward')) 
            { 
                session()->put('dept_id', 1);
                // return redirect('/deptlogin/deptdash');
                return redirect($url);
            } else {
                return redirect('/deptlogin')->withError('Invalid email or password');
            }
        }
        elseif($request->email == 'electricity@gmail.com'){
            $de = "electricity";
            $url = url('/deptlogin/deptdash') ."/". $de;
            if ($user[0]->passward == $request->input('passward')) 
            { 
                session()->put('dept_id', 1);
                // return redirect('/deptlogin/deptdash');
                return redirect($url);
            } else {
                return redirect('/deptlogin')->withError('Invalid email or password');
            }
        }
        elseif($request->email == 'disaster@gmail.com'){
            $de = "disaster";
            $url = url('/deptlogin/deptdash') ."/". $de;
            if ($user[0]->passward == $request->input('passward')) 
            { 
                session()->put('dept_id', 1);
                // return redirect('/deptlogin/deptdash');
                return redirect($url);
            } else {
                return redirect('/deptlogin')->withError('Invalid email or password');
            }
        }
        else{
            return redirect('/deptlogin');
        }
        return $next($request);
    }
}
