<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;

class ResetPasswardController extends Controller
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
            $data['title'] = "Reset passward";
            $data['body'] = "click to change your passward";

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
                'passward' => 'required|confirmed',
                'passward_confirmation' => 'required'
            ]
        );

        // $passward = $request['passward'];
        // $canform_passward = $request['canform_passward'];
        $hashPass = Hash::make($request['passward']);
        // $customer = customer::where('customer_id', $cid)->get();
        $customer = customer::where('remember_token', $tokan)->first();
        echo "<pre>";
        print_r($customer);
        
        if ($customer != null) {

            // $customer = Customer::find($customer[0]['customer_id']);
            // $customer->email_verified_at = $datetime;
            $customer->remember_token = "";
            $customer->passward = $hashPass;
            $customer->save();

            return redirect('/login');
            // echo "<pre>";
            // print_r($customer);
        } else {
            return view('404');
        }

    }

}
