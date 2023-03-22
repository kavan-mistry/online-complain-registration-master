<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class VerifiedEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $data = $request->route('data');
        $cid = Session()->get('cid');
        $customer = Customer::where('customer_id', $cid)->first();
        // print_r($customer);
        $email = $customer->email;
        $varify = $customer->is_verified;
        // echo $email;
        // echo "<pre>";
        // echo $varify;
        // die;
        if($varify == 1){
            // return view('dash');
            return $next($request);
        }
        else{
            return redirect('/resend-verify-email' . '/' . $email);
        }

    }
}
