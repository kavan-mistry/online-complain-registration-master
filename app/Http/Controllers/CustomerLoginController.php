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

    public function complain()
    {
        return $this->hasMany(Complaint::class);
    }

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

        echo "<pre>";
        print_r($user);
        die;
        if (empty($user->all())) {
            return redirect('/login')->withError('Invalid email or password');
        } elseif ($user[0]->passward == $request->input('passward')) {
            session()->put('customer_id', 1);
            // return redirect('/login/dash');
        } else {
            return redirect('/login')->withError('Invalid email or password');
        }
    }

    public function dash($cid)
    {
        $cid = session()->get('cid');
        $data = compact('cid');
        // echo "<pre>";
        // print_r($cid);
        // echo "<pre>";
        // print_r($data);
        return view('dash')->with($data);
    }

    public function viewComp(Request $request, $cid)
    {
        $search = $request['search'] ?? "";
        $dept = $request['dept'];
        $customer_id = $cid;
        $user = Customer::find($customer_id);
        $complain = Complain::where('customer_id', $customer_id)->sortable()->paginate(6);
        if($request->isMethod('post')){
            if ($dept != "" && $search != "") {
                // echo $search;
                // echo $dept;
                // die;
                $complain = Complain::sortable()->where([
                    ['customer_id', '=' , $customer_id],
                    ['name', 'LIKE', "%$search%"],
                    ['dept', '=', "$dept"]
                ])->paginate(6);
                /* echo "<pre>";
                print_r($complain);
                die; */
            } elseif ($dept != "") {
                // echo 'hi';
                // die;
                $complain = Complain::sortable()->where('dept', '=', "$dept")->paginate(6);
            } elseif ($search != "") {
                $complain = Complain::sortable()->where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->paginate(6);
            } else {
                $complain = Complain::sortable()->paginate(6);
            }
        }
        // echo "<pre>";
        // print_r($complain);
        //     die;
        
        
        
        $data = compact('complain', 'search', 'customer_id');
        // echo $cid;
        // echo "<pre>";
        // print_r($data);
        return view('viewComp')->with($data);
        
    }
}
