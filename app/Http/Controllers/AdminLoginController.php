<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Complain;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{

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
        } elseif ($user[0]->password == $request->input('password')) {
            session()->put('admin_id', 1);
            return redirect('/adlogin/addash');
        } else {
            return redirect('/adlogin')->with('errorPass', 'Invalid password');
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
        $problem_types = $this->problem_types;
        $search = $request['search'] ?? "";
        $pt = $request['pt'];
        $dept = $request['dept'];

        if ($dept != "" && $search != "" && $pt != "") {
            $complain = Complain::sortable()->where([
                ['name', 'LIKE', "%$search%"],
                ['mob', 'LIKE', "%$search%"],
                ['pt', '=', "$pt"],
                ['dept', '=', "$dept"]
            ])->paginate(10);
            // $complain = Complain::sortable()->where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->paginate(6);
        } elseif ($pt != "" && $search != "") {
            $complain = Complain::sortable()->where([
                ['name', 'LIKE', "%$search%"],
                ['mob', 'LIKE', "%$search%"],
                ['pt', '=', "$pt"],
            ])->paginate(10);
        } elseif ($dept != "") {
            $complain = Complain::sortable()->where('dept', '=', "$dept")->paginate(10);
        } elseif ($pt != "") {
            $complain = Complain::sortable()->where('pt', '=', "$pt")->paginate(10);
        } elseif ($search != "") {
            $complain = Complain::sortable()->where('name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->orWhere('mob', 'LIKE', "%$search%")->paginate(10);
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
        $data = compact('complain', 'search', 'dept', 'problem_types', 'pt');
        return view('addash')->with($data);
    }

    public function delete($id)
    {
        $complain = Complain::find($id);
        if (!is_null($complain)) {
            $complain->delete();
        }
        return redirect('/adlogin/addash/view')->with('success', 'Complain deleted successfully.');
    }

    public function edit($id)
    {
        $complain = Complain::find($id);
        if (is_null($complain)) {
            return redirect('/adlogin/addash/view');
        } else {
            $states = $this->states;
            $problem_types = $this->problem_types;
            $url = url('/adlogin/addash/view/update') . "/" . $id;
            $data = compact('complain', 'url', 'states', 'problem_types');
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
                'address' => 'required',
                'city' => 'required',
                'state' => 'required|not_in:0',
                'zip' => 'required',
                // 'pt' => 'required|not_in:0',
                // 'dept' => 'required|not_in:0',
                'pd' => 'required',
            ]
        );

        $status = $request['status'];
        session()->put('status', $status);

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
        $complain->save();
        return redirect('/adlogin/addash/view')->with('success', 'Complain edited successfully.');
    }
}
