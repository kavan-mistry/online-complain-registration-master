<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Complain;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('adlogin');
    }

    public function adlogin(Request $request)
    {
        $request->validate(
            [
                'email' => 'email|required',
                'passward' => 'required',
            ]
            );

        $user = admin::where('email', $request->input('email'))->get();

        echo "<pre>";
        print_r($user);

        if(empty($user->all())) {
            return redirect('/adlogin')->withError('Invalid email or password');
        }
        
        elseif($user[0]->passward==$request->input('passward'))
        {
            session()->put('admin_id', 1);
            return redirect('/adlogin/addash');
        } else {
            return redirect('/adlogin')->withError('Invalid email or password');
        }
    }

    // public function addash()
    // {
    //     return view('addash');
    // }

    public function adhome()
    {
        return view('adhome');
    }

    public function addash()
    {
        $complain = Complain::all();
        $data = compact('complain');
        return view('addash')->with($data);
    }

    public function delete($id)
    {
        $complain = Complain::find($id);
        if(!is_null($complain)){
            $complain->delete();
        }
        return redirect('/adlogin/addash/view');
    }

    public function edit($id)
    {
        $complain = Complain::find($id);
        if(is_null($complain)){
            return redirect('/adlogin/addash/view');
        }
        else{
            $url = url('/adlogin/addash/view/update') ."/". $id;
            $data = compact('complain', 'url');
            // print_r($data);
            return view('editComplain')->with($data , $url);
        }
    }

    public function update($id, Request $request){
        $complain = Complain::find($id);
        $complain->name = $request['name'];
        $complain->email = $request['email'];
        $complain->address = $request['address'];
        $complain->city = $request['city'];
        $complain->state = $request['state'];
        $complain->zip = $request['zip'];
        $complain->pt = $request['pt'];
        $complain->pt = $request['pt'];
        $complain->dept = $request['dept'];
        $complain->mob = $request['mob'];
        $complain->pd = $request['pd'];
        $complain->status = $request['status'];
        $complain->save();
        return redirect('/adlogin/addash/view');
    }
}
