<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\customer;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail as FacadesMail;

class EmailVerificationController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    // public function __invoke(Request $request): RedirectResponse|View
    // {
    //     return $request->user()->hasVerifiedEmail()
    //                 ? redirect()->intended(RouteServiceProvider::HOME)
    //                 : view('auth.verify-email');
    // }

    public function sendVerifyMail($email)
    {
        if(customer::find($email)){
            $customer = customer::where('email', $email)->get();

            $random = Str::random(40);
            $domain = URL::to('/');
            $url = $domain.'/'.$random;

            $data['email'] = $email;
            $data['title'] = "Email verification";
            $data['body'] = "click to verify your email";

            Mail::send('verifyMail', ['data'=>$data], function($message) use($data){
                $message->to($data['email'])->subject($data['title']);
            } );
        }
        else{
            
        }
    }
}
