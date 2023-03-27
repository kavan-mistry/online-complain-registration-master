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

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;

class   CustomerLoginController extends Controller
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
                'password' => 'required',
            ]
        );

        $user = customer::where('email', $request->input('email'))->get();


        if (empty($user->all())) {
            return redirect('/login')->withError('Invalid email or password');
        } 
        elseif ($user[0]->password == $request->input('password')) {
            session()->put('customer_id', 1);
            // return redirect('/login/dash');
        } 
        else {
            return redirect('/login')->withError('Invalid email or password');
        }
    }

    public $states = [
        'Andhra Pradesh', 'Arunachal Pradesh', 'Assam, Bihar', 'Chhattisgarh', 'Goa', 'Gujarat',
        'Haryana', 'Himachal Pradesh', 'Jammu and Kashmir', 'Jharkhand', 'Karnataka', 'Kerala', 'Madhya Pradesh',
        'Maharashtra', 'Manipur', 'Meghalaya', 'Mizoram', 'Nagaland', 'Odisha', 'Punjab', 'Rajasthan', 'Sikkim',
        'Tamil Nadu', 'Telangana', 'Tripura', 'Uttar Pradesh', 'West Bengal'
    ];

    public $problem_types = [
        'Ac-Fridge-water cooler etc. not working ( Muni Hospital-Office Bldg)',
        'Any Ele. Problem in Swimminig Pool OR releated Pump,Motor Etc.',
        'Application done but not resolved-Property Tax',
        'Application Not Yet Approved - Swimming',
        'Applied For Entry But Still Not Approved - GYM',
        'Applied For The License But Not Yet Received',
        'Balvatika',
        'Basic Needs Like Water, Light and Fan Repairing - Library',
        'Cleaners Not Coming - SWM',
        'Clearing off the Big Dead Animals',
        'Clearing off the Dead Animals',
        'Coach is Irregular/Remains Absent - Swimming',
        'Contaminated Water/Dirty Surroundings Causes Mosquito Reproduction',
        'Deep Pit - Large settlement of road',
        'Delay In Issuing The certificates -  - Birth/Death/Marriage Certificate',
        'Emptying The Dustbins',
        'Footpath Repairing Required',
        'Watering is Not Proper/Regular - Garden',
        'Waterlogged Due To Rain',
        'Water timing related'
    ];

    public function dash()
    {
        $cid = session()->get('cid');
        $customer = customer::where('customer_id', $cid)->first();

        $states = $this->states;
        $problem_types = $this->problem_types;

        $data = compact('cid', 'customer', 'states', 'problem_types');
        return view('dash')->with($data);
    }

    public function viewComp(Request $request)
    {
        // $this->problem_types[] = 'problem_types';
        $problem_types = $this->problem_types;
        $search = $request['search'] ?? "";
        $pt = $request['pt'];
        //print_r($dept);
        $customer_id = Session()->get('cid');
        // print_r($customer_id);
        $user = Customer::where('customer_id', $customer_id)->value('name');
        session()->put('user',$user);
        $complain = Complain::where('customer_id', $customer_id)->orderBy('complain_id' ,'desc')->sortable()->paginate(7);
        //if ($request->isMethod('post')) {
        if ($pt != "" && $search != "") {
            // print_r("sss");
            // echo $search;
            // echo $dept;
            // die;
            $complain = Complain::sortable()->where([
                // ['customer_id', '=', $customer_id],
                ['name', 'LIKE', "%$search%"],
                ['pt', '=', "$pt"],
                ['customer_id', $customer_id]
            ])->orderBy('complain_id' ,'desc')->paginate(7)->appends(['pt' => $pt, 'search' => $search]);
            /* echo "<pre>";
                print_r($complain);
                die; */
        } elseif ($pt != "") {
            // print_r("jjii");
            // echo 'hi';
            // die;
            $complain = Complain::sortable()->where([
                ['pt', '=', "$pt"],
                ['customer_id', $customer_id]
            ])->orderBy('complain_id' ,'desc')->paginate(7)->appends(['pt' => $pt]);
        } elseif ($search != "") {
            // print_r("qaqaqa");
            $complain = Complain::sortable()->where([
                ['name', 'LIKE', "%$search%"],
                ['customer_id', $customer_id]
            ])->orWhere('email', 'LIKE', "%$search%")->orderBy('complain_id' ,'desc')->paginate(7);
        }
        //}

        // echo "<pre>";
        // print_r($complain);
        //     die;



        $data = compact('complain', 'search', 'customer_id', 'pt', 'user', 'problem_types');
        // echo $cid;
        // echo "<pre>";
        // print_r($data);
        return view('viewComp')->with($data);
    }


    public function close($id){
        $complain = Complain::find($id);
        if (!is_null($complain)) {
            $complain->delete();
        }
        return redirect()->back()->with('success', 'Complain Closed successfully.');
    }

}
