<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Faker\Core\DateTime;
// use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $a_email = session()->get('new_mail');
        // echo "<pre>";
        // var_dump($customer);
        // die;

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

    public function resetMail(Request $request)
    {

        $request->validate(
            [
                'email' => 'email|required',
            ]
        );

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

        $customer_new_valid = customer::where('email', $new_email)->first();
        var_dump($customer_new_valid);
        // die;
        if($customer_new_valid == null){
            // echo "inside";
            Mail::send('emailTemp', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'])->subject($data['title']);
            });
            // echo $email;
            // echo $sendmail;
            $customer->remember_token = $random;
            $customer->email = $new_email;
            $customer->save();
            session()->put( 'new_email' ,$new_email);

            $url = '/resend-verify-email' . '/' . $new_email;

            return redirect($url)->with('success', 'Mail send successfully.');

        }
        else{
            // echo "outside";
            return redirect()->back()->with('error', 'Mail already exists! try new mail id');
        }

    }

    public function VerifyMail($tokan)
    {

        $customer = customer::where('remember_token', $tokan)->first();
        
        // echo "<pre>";
        // print_r($customer);        
        // die;
        if (isset($customer)) {
            $datetime = now();
            $customer = Customer::find($customer['customer_id']);
            $customer->email_verified_at = $datetime;
            $customer->remember_token = "";
            $customer->is_verified = 1;
            $customer->save();
            
            return redirect('/login')->with('success', 'Verified successfully.');
            // echo "<pre>";
            // print_r($customer);
        } 
        else {
            return view('404');
        }
    }
}
