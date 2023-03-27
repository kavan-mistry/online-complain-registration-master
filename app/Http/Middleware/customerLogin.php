<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Customer;
use App\Models\customer;
use Illuminate\Contracts\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;

class customerLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $email = $request->email;
        $user = Customer::where('email', $email)->value('email');
        // echo $email;
        // echo "<pre>";
        // echo $user;
        // print_r($user);
        // die;
        if (isset($email)) {
            if ($email == $user) {
                $cid = Customer::where('email', $email)->value('customer_id');
                $url = url('/login/dash') . '/view';
                $user1 = customer::where('email', $request->input('email'))->get();
                // if (empty($user->all())) {
                //     return redirect('/login')->withError('Invalid email or password');
                // } 
                // echo "<pre>";
                // print_r($user1);
                // die;
                if (Hash::check($request->input('password'), $user1[0]->password)) {
                    // session()->put('customer_id', 1);
                    // echo "<pre>";
                    // echo $url;
                    // echo "<pre>";
                    // print_r($cid);
                    session()->put('cid', $cid);
                    return redirect($url)->with($cid, $url);
                } else {
                    return redirect('/login')->with('errorPass' ,'Invalid password')->withInput();
                }
            } else {
                return redirect('/login')->with('errorEmail' ,'Invalid email');
            }
        } else {
            return redirect('/login')->withError('please enter email');
        }
        return $next($request);
    }
}
