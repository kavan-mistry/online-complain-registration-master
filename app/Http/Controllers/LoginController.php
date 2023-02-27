<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'email|required',
                'mob' => 'required|min:10|max:11',
                'passward' => 'required|confirmed',
                'passward_confirmation' => 'required'
            ]
            );

        // echo "<pre>";
        // print_r($request->all());

        $customer = new Customer;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->mob = $request['mob'];
        $customer->passward = $request['passward'];
        $customer->save();

        return redirect('/login');
    }
}
