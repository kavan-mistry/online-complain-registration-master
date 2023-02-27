<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\customer;
use App\Models\User;
use PharIo\Manifest\Url;
use Error;
use Illuminate\Http\Request;
use Mockery\Generator\StringManipulation\Pass\Pass;
use PHPUnit\Event\Test\Passed;

class CustomerLoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'email|required',
                'passward' => 'required',
            ]
            );

        $user = customer::where('email', $request->input('email'))->get();

        // echo "<pre>";
        // print_r($user);

        if(empty($user->all())) {
            return redirect('/login')->withError('Invalid email or password');
        }
        
        elseif($user[0]->passward==$request->input('passward'))
        {
            session()->put('customer_id', 1);
            return redirect('/login/dash');
        } else {
            return redirect('/login')->withError('Invalid email or password');
        }
    }

    public function dash(){
        return view('dash');
    }

    public function viewComp()
    {
        $complain = Complain::all();
        $data = compact('complain');
        return view('viewComp')->with($data);
    }
}

