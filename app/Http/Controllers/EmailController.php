<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;

class EmailController extends Controller
{
    public function sendVerifyMail($email)
    {
        // $a = Customer::find($email);
        $a = Customer::where('email', $email)->first();
        if ($a != null) {
            $customer = customer::where('email', $email)->first();

            $random = Str::random(40);
            $domain = URL::to('/');
            $url = $domain . '/verify' . '/' . $random;

            $data['url'] = $url;
            $data['email'] = $email;
            $data['title'] = "Email verification";
            $data['body'] = "click to verify your email";

            Mail::send('emailTemp', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'])->subject($data['title']);
            });
            // echo $email;
            // echo $sendmail;
            $customer->remember_token = $random;
            $customer->save();

            return redirect('/login');
        } else {
            return redirect('/');
        }
    }

    public function resendVerifyMailView($email)
    {
        $data = compact('email');
        return view('verify-email')->with($data);
    }


    public function resendVerifyMail($email)
    {
        // $email = $email;
        $customer = customer::where('email', $email)->first();
        $random = Str::random(40);
        $domain = URL::to('/');
        $url = $domain . '/verify' . '/' . $random;

        $data['url'] = $url;
        $data['email'] = $email;
        $data['title'] = "Resend Email verification";
        $data['body'] = "click to verify your email";

        Mail::send('emailTemp', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });
        // echo $email;
        // echo $sendmail;
        $customer->remember_token = $random;
        $customer->save();

        return redirect()->back()->with('success', 'Mail send successfully.');
    }

    public function resetMail(Request $request){

        $new_email = $request->email;
        $email = $request->old_email;

        $customer = customer::where('email', $email)->first();
        $random = Str::random(40);
        $domain = URL::to('/');
        $url = $domain . '/verify' . '/' . $random;

        $data['url'] = $url;
        $data['email'] = $new_email;
        $data['title'] = "Reset Email verification";
        $data['body'] = "click to verify your email";

        Mail::send('emailTemp', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });
        // echo $email;
        // echo $sendmail;
        $customer->remember_token = $random;
        $customer->email = $new_email;
        $customer->save();

        return redirect()->back()->with('success', 'Mail send successfully.');

    }

    public function VerifyMail($tokan)
    {

        $customer = customer::where('remember_token', $tokan)->get();

        if (count($customer) > 0) {

            $datetime = Carbon::now()->format('d-m-y h:i:s');
            $customer = Customer::find($customer[0]['customer_id']);
            $customer->email_verified_at = $datetime;
            $customer->remember_token = "";
            $customer->is_verified = 1;
            $customer->save();

            return redirect('/login');
            // echo "<pre>";
            // print_r($customer);
        } else {
            return view('404');
        }
    }
}
