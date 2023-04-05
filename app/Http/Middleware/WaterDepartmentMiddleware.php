<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\department;
use Error;
use Illuminate\Support\Facades\Hash;
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
        echo $request['email'];
        echo $request['password'];
        
        $user = department::where('email', $request->input('email'))->first();
        $request->validate(
            [
                'email' => 'email|required',
                'password' => 'required',
            ]
        );
        
        if(isset($user)){
            if(Hash::check($request['password'], $user['password'])){
                $department = $user->department;
                session()->put('department', $department);
                return $next($request);
            }
            else{
                return redirect()->back()->with('errorPass','Invalid password')->withInput();
            }
        }
        else{
            return redirect('/deptlogin')->with('errorEmail','Invalid email');
        }
    }
}
