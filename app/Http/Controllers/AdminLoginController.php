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

        if (empty($user->all())) {
            return redirect('/adlogin')->withError('Invalid email or password');
        } elseif ($user[0]->passward == $request->input('passward')) {
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
        return redirect('/adlogin/addash/view');
    }

    public function addash(Request $request)
    {
        $search = $request['search'] ?? "";
        $dept = $request['dept'];
        if ($dept != "" && $search != "") {
            $complain = Complain::sortable()->where([
                ['name', 'LIKE', "%$search%"],
                ['dept', '=', "$dept"]
            ])->paginate(10);
            // $complain = Complain::sortable()->where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->paginate(6);
        } elseif ($dept != "") {
            $complain = Complain::sortable()->where('dept', '=', "$dept")->paginate(10);
        }
        // elseif($dept == "" && $search == ""){
        //     $complain = Complain::sortable()->paginate(6);
        // }
        elseif ($search != "") {
            $complain = Complain::sortable()->where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->paginate(10);
            // $complain = Complain::sortable()->where('name', 'LIKE', "%$search%")->when($search, function ($search, $dept) {
            //     return $search->where('dept', $dept);
            // })->paginate(6);
            // $complain = Complain::sortable()->where([
            //     ['name', 'LIKE', "%$search%"],
            //     ['dept', '=', "$dept"]
            // ])->paginate(6);
        } else {
            $complain = Complain::sortable()->paginate(10);
        }
        $data = compact('complain', 'search', 'dept');
        return view('addash')->with($data);
    }

    public function delete($id)
    {
        $complain = Complain::find($id);
        if (!is_null($complain)) {
            $complain->delete();
        }
        return redirect('/adlogin/addash/view');
    }

    public function edit($id)
    {
        $complain = Complain::find($id);
        if (is_null($complain)) {
            return redirect('/adlogin/addash/view');
        } else {
            $url = url('/adlogin/addash/view/update') . "/" . $id;
            $data = compact('complain', 'url');
            // print_r($data);
            return view('editComplain')->with($data, $url);
        }
    }

    public function update($id, Request $request)
    {
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
