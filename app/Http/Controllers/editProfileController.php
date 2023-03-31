<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;

class editProfileController extends Controller
{

    public function edit_profile_view()
    {

        $customer_id = session()->get('cid');
        $customer = customer::where('customer_id', $customer_id)->first();

        $data = compact('customer');

        return view('editProfile')->with($data);
    }

    public function edit_profile(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'email|required',
                'mob' => 'required|min:10|max:10',
                'password' => 'confirmed',
                'password_confirmation' => ''
            ]
        );



        $customer_id = session()->get('cid');
        $customer = customer::where('customer_id', $customer_id)->first();

        $new_email = $request->email;
        $old_email = $customer->email;

        $random = Str::random(40);
        $domain = URL::to('/');
        $url = $domain . '/verify' . '/' . $random;

        $data['url'] = $url;
        $data['email'] = $new_email;
        $data['title'] = "Reset Email verification";
        $data['body'] = "click to verify your email";

        $customer_new_valid = customer::where('email', $new_email)->first();

        // echo "<pre>";
        // print_r($customer_new_valid);
        // die;

        if ($request['password'] != null) {

            if ($customer_new_valid == null) {

                Mail::send('emailTemp', ['data' => $data], function ($message) use ($data) {
                    $message->to($data['email'])->subject($data['title']);
                });

                $hashPass = Hash::make($request['password']);
                $customer->name = $request['name'];
                $customer->email = $request['email'];
                $customer->mob = $request['mob'];
                $customer->password = $hashPass;
                $customer->is_verified = 0;
                $customer->remember_token = $random;
                $customer->email = $new_email;
                $customer->save();

                $url1 = '/login/dash/view';
                return redirect($url1)->with('success', 'Mail send successfully.');
            } elseif ($new_email == $old_email) {

                $hashPass = Hash::make($request['password']);
                $customer->name = $request['name'];
                $customer->mob = $request['mob'];
                $customer->password = $hashPass;
                $customer->save();

                $url1 = '/login/dash/view';
                return redirect($url1)->with('success', 'New Details saved successfully !');
            } else {
                return redirect()->back()->with('error', 'Mail already exists! try new mail id');
            }
        } else {

            if ($customer_new_valid == null) {

                Mail::send('emailTemp', ['data' => $data], function ($message) use ($data) {
                    $message->to($data['email'])->subject($data['title']);
                });

                $customer->name = $request['name'];
                $customer->email = $request['email'];
                $customer->mob = $request['mob'];
                $customer->is_verified = 0;
                $customer->remember_token = $random;
                $customer->email = $new_email;
                $customer->save();

                $url1 = '/login/dash/view';
                return redirect($url1)->with('success', 'Mail send successfully.');
            } elseif ($new_email == $old_email) {

                $customer->name = $request['name'];
                $customer->mob = $request['mob'];
                $customer->save();

                $url1 = '/login/dash/view';
                return redirect($url1)->with('success', 'New Details saved successfully !');
            } else {
                return redirect()->back()->with('error', 'Mail already exists! try new mail id');
            }
        }
    }
}
