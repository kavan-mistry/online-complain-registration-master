<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;

class ResetpasswordController extends Controller
{

    public function resetPassView()
    {
        return view('resetPassView');
    }


    public function resetPassSend(Request $request)
    {

        $email = $request['email'];

        $c = customer::where('email', $email)->exists();
        // var_dump($c);

        if ($c) {
            $customer = customer::where('email', $email)->first();

            $random = Str::random(40);
            $domain = URL::to('/reset-pass');
            $cid = $customer->customer_id;
            $cname = $customer->name;
            $url = $domain . '/' . $cid . '/' . $random;

            $data['url'] = $url;
            $data['name'] = $cname;
            $data['email'] = $email;
            $data['title'] = "Reset password";
            $data['body'] = "click to change your password";

            Mail::send('resetPassTemp', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'])->subject($data['title']);
            });

            $customer->remember_token = $random;
            $customer->save();

            return redirect()->back()->with('success', 'Mail send successfully.');
        } else {
            return redirect()->back()->with('error', 'Mail not found.');
        }
    }

    public function resetPassEnter($cid, $tokan){

        $customer = customer::where('customer_id', $cid)->get();
        $data = compact('cid','tokan');
        if (count($customer) > 0) {

           return view('resetPassInput')->with($data);

        } else {
            return view('404');
        }

    }


    public function resetPass(Request $request, $cid, $tokan){

        $request->validate(
            [
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ]
        );

        // $password = $request['password'];
        // $canform_password = $request['canform_password'];
        $hashPass = Hash::make($request['password']);
        // $customer = customer::where('customer_id', $cid)->get();
        $customer = customer::where('remember_token', $tokan)->first();
        echo "<pre>";
        print_r($customer);
        
        if ($customer != null) {

            // $customer = Customer::find($customer[0]['customer_id']);
            // $customer->email_verified_at = $datetime;
            $customer->remember_token = "";
            $customer->password = $hashPass;
            $customer->save();

            return redirect('/login');
            // echo "<pre>";
            // print_r($customer);
        } else {
            return view('404');
        }

    }

}
