<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $email = $request->email;
        
        $customer = Customer::where('email', $email)->value('email');
        
        if($customer == ""){
            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'email|required',
                    'mob' => 'required|min:10|max:10',
                    'passward' => 'required|confirmed',
                    'passward_confirmation' => 'required'
                ]
                );
    
            // echo "<pre>";
            // print_r($request->all());
    
            $hashPass = Hash::make($request['passward']);

            $customer = new Customer;
            $customer->name = $request['name'];
            $customer->email = $request['email'];
            $customer->mob = $request['mob'];
            $customer->passward = $hashPass;
            $customer->save();
     
            // event(new Registered($customer));
            return redirect('send-verify-email' . '/' . $request['email']);
        }
        else{
            return redirect('/')->withError('Mail id already exists, use another mail id');
        }

    }
}
