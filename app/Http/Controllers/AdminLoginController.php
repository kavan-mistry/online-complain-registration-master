<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Complain;
use App\Models\customer;
use App\Models\department;
use App\Models\dept_images;
use App\Models\Image;
use App\Models\Notices;
use App\Models\Problem_types;
use App\Models\Reopen_complain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{


    public $states = [
        'Andhra Pradesh', 'Arunachal Pradesh', 'Assam, Bihar', 'Chhattisgarh', 'Goa', 'Gujarat',
        'Haryana', 'Himachal Pradesh', 'Jammu and Kashmir', 'Jharkhand', 'Karnataka', 'Kerala', 'Madhya Pradesh',
        'Maharashtra', 'Manipur', 'Meghalaya', 'Mizoram', 'Nagaland', 'Odisha', 'Punjab', 'Rajasthan', 'Sikkim',
        'Tamil Nadu', 'Telangana', 'Tripura', 'Uttar Pradesh', 'West Bengal'
    ];

    public function index()
    {
        return view('adlogin');
    }

    public function adlogin(Request $request)
    {
        $request->validate(
            [
                'email' => 'email|required',
                'password' => 'required',
            ]
        );

        $user = admin::where('email', $request->input('email'))->get();

        // echo "<pre>";
        // print_r($user[0]->password);
        // die;
        if (empty($user->all())) {
            return redirect('/adlogin')->with('errorEmail', 'Invalid email');
        } elseif (Hash::check($request->input('password'), $user[0]->password)) {
            session()->put('admin_id', 1);
            return redirect('/adlogin/addash');
        } else {
            return redirect('/adlogin')->with('errorPass', 'Invalid password');
        }
    }

    public function change_pass(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());

        $request->validate(
            [
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ]
        );

        $hashPass = Hash::make($request['password']);

        $admin = admin::where('id', 1)->first();
        echo $admin;
        // die;
        $admin->password = $hashPass;
        $admin->save();

        notify()->success('Password chnaged successfully');
        return redirect()->back();
    }

    // public function addash()
    // {
    //     return view('addash');
    // }

    public function adhome()
    {
        return redirect('/adlogin/addash/view');
    }

    public function ad_cust_list()
    {

        $customers = customer::get();
        $data = compact('customers');
        return view('customerList')->with($data);
    }

    public function ad_cust_list_blocked()
    {

        $customers = customer::onlyTrashed()->get();
        $data = compact('customers');
        return view('customerListBlocked')->with($data);
    }

    public function addash(Request $request)
    {
        $problem_types = Problem_types::get();
        $departments = department::get();
        $notices = Notices::get();
        $search = $request['search'] ?? "";
        $pt = $request['pt'];
        $dept = $request['dept'];
        $status = $request['status'];

        $active = Complain::where('status', 1)->count();

        $re_opened = Complain::where('status', 4)->count();

        if ($dept != "" && $search != "" && $pt != "" && $status != "") {
            $complain = Complain::where([
                ['name', 'LIKE', "%$search%"],
            ])->get();
            // $complain = Complain::sortable()->where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->paginate(6);
        } elseif ($pt != "" && $search != "") {
            $complain = Complain::where([
                ['name', 'LIKE', "%$search%"],
                ['mob', 'LIKE', "%$search%"],
                ['pt', '=', "$pt"],
            ])->get();
        } elseif ($dept != "") {
            $dept1 = department::where('department', '=', "$dept")->value('department_id');
            $complain = Complain::where('department_id', '=', "$dept1")->get();
        } elseif ($pt != "") {
            $complain = Complain::where('pt', '=', "$pt")->get();
        } elseif ($search != "") {
            $complain = Complain::where('name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->orWhere('mob', 'LIKE', "%$search%")->get();
            // $complain = Complain::sortable()->where('name', 'LIKE', "%$search%")->when($search, function ($search, $dept) {
            //     return $search->where('dept', $dept);
            // })->paginate(6);
            // $complain = Complain::sortable()->where([
            //     ['name', 'LIKE', "%$search%"],
            //     ['dept', '=', "$dept"]
            // ])->paginate(6);
        } elseif ($status != "") {
            $complain = Complain::where('status', '=', "$status")->get();
        }
        else {
            $complain = Complain::withTrashed('departmentcm')->get();
        }

        //echo $complain

        // die;
        $blocked_customer = customer::withTrashed()->get();
        // echo $blocked_customer;
        // die;

        $data = compact('complain', 'search', 'dept', 'problem_types', 'pt', 'departments', 'blocked_customer', 'notices', 'status', 'active', 're_opened');
        return view('addash')->with($data);
    }

    public function delete($id)
    {
        $complain = Complain::find($id);
        if (!is_null($complain)) {
            $complain->status = '5';
            $complain->save();
            $complain->delete();
        }
        notify()->success('Complain Deleted successfully.');
        return redirect('/adlogin/addash/view');
    }

    public function edit($id)
    {
        $complain = Complain::withTrashed()->find($id);
        $reopen_complain = Reopen_complain::where('complain_id', $id)->first();
        // $complain1 = Complain::where('complain_id', $complain_id)->first();
        $dept_name = department::where('department_id', $complain['department_id'])->value('department');
        
        if (is_null($complain)) {
            return redirect('/adlogin/addash/view');
        } else {
            $states = $this->states;
            $problem_types = Problem_types::get();
            $url = url('/adlogin/addash/view/update') . "/" . $id;
            $images = Image::where([
                ['complain_id', $id],
                ['reopen_id', 0]
            ])->get();
            $reopen_images = Image::where([
                ['complain_id', $id],
                ['reopen_id', '!=', 0]
            ])->get();
            $dept_images = dept_images::where([
                ['complain_id', $id],
                ['reopen_id', '!=', 0]
            ])->get();
            $dept_reopen_images = dept_images::where([
                ['complain_id', $id],
                ['reopen_id', 0]
            ])->get();
            $data = compact('complain', 'url', 'states', 'problem_types', 'images', 'dept_images', 'reopen_complain', 'reopen_images', 'dept_reopen_images', 'dept_name');
            // print_r($data);
            return view('editComplain')->with($data, $url);
        }
    }

    public function update($id, Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'email|required',
                'mob' => 'required|min:10|max:11',
                'address' => 'required|max:255',
                'city' => 'required|regex:([a-zA-Z- ])',
                'state' => 'required|not_in:0',
                'zip' => 'required',
                // 'pt' => 'required|not_in:0',
                // 'dept' => 'required|not_in:0',
                'pd' => 'required|max:1000',
            ],
            [
                'mob.required' => 'The contact number field is required.',
                'pd.max' => 'The problem description must not be greater than 1000 characters.',
                'pd.required' => 'The problem description field is required.',
            ]
        );

        $status = $request['status'];
        session()->put('status', $status);

        $complain1 = Complain::where('complain_id', $id)->value('pt');
        $comp_str = $complain1 . " : edited successfully";
        // echo $id;
        // echo $comp_str;
        // die;
        // die($complain1);
        $complain = Complain::find($id);
        $complain->name = $request['name'];
        $complain->email = $request['email'];
        $complain->address = $request['address'];
        $complain->city = $request['city'];
        $complain->state = $request['state'];
        $complain->zip = $request['zip'];
        // $complain->pt = $request['pt'];
        // $complain->dept = $request['dept'];
        $complain->mob = $request['mob'];
        $complain->pd = $request['pd'];
        $complain->status = $request['status'];

        if ($status == 3) {
            $request->validate(
                [
                    'rejection_reason' => 'required',
                ]
            );
            $complain->rejection_reason = $request['rejection_reason'];
        }
        // $data = compact('complain1');
        $complain->save();
        notify()->success($comp_str);
        return redirect('/adlogin/addash/view');
    }


    public function ad_cust_block($id)
    {
        $customer = customer::find($id);

        if (!is_null($customer)) {
            $customer->delete();
        }
        notify()->success('Customer Blocked successfully.');
        return redirect()->back();
    }

    public function ad_cust_unblock($id)
    {
        $customer = customer::withTrashed()->find($id);

        if (!is_null($customer)) {
            $customer->restore();
        }
        notify()->success('Customer Unblocked successfully.');
        return redirect()->back();
    }

    public function ad_cust_delete($id)
    {
        $customer = customer::withTrashed()->find($id);

        if (!is_null($customer)) {
            $customer->forceDelete();
        }

        notify()->success('Customer Deleted successfully.');
        return redirect()->back();
    }
}
