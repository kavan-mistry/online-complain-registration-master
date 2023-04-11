<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\department;
use App\Models\Image;
use App\Models\Problem_types;
use Illuminate\Support\Str;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class complainController extends Controller
{

    public function customer()
    {
        return $this->belongsTo(customers::class);
    }

    public function complain(Request $request)
    {
        $cid = Session()->get('cid');
        $prt = $request['pt'];
        // echo $prt;
        // die('x');
        // $aa = $request->all();
        // echo "<pre>";
        // print_r($aa);
        // die;



        if ($request['pt'] == 'Other') {
            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'email|required',
                    'mob' => 'required|min:10|max:11',
                    'address' => 'required|max:255',
                    'city' => 'required|regex:/^[a-zA-Z]+$/u',
                    'state' => 'required|not_in:0',
                    'zip' => 'required|max:6',
                    'pt' => 'required|not_in:0',
                    'pd' => 'required|max:1000',
                    'file' => 'required|max:5',
                    'opt' => 'required'
                ],
                [
                    'mob.required' => 'The contact number field is required.',
                    'pt.required' => 'The problem type field is required.',
                    'pd.max' => 'The problem description must not be greater than 1000 characters.',
                    'pd.required' => 'The problem description field is required.',
                    'opt.required' => 'Please specify your problem.',
                ]
            );
        } else {
            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'email|required',
                    'mob' => 'required|min:10|max:11',
                    'address' => 'required|max:255',
                    'city' => 'required|regex:/^[a-zA-Z]+$/u',
                    'state' => 'required|not_in:0',
                    'zip' => 'required|max:6',
                    'pt' => 'required|not_in:0',
                    // 'dept' => 'required|not_in:0',
                    'pd' => 'required|max:1000',
                    'file' => 'required|max:5'
                ],
                [
                    'mob.required' => 'The contact number field is required.',
                    'pt.required' => 'The problem type field is required.',
                    'pd.max' => 'The problem description must not be greater than 1000 characters.',
                    'pd.required' => 'The problem description field is required.',
                ]
            );
        }

        $department_id = Problem_types::where('problems', $prt)->first();
        foreach ($department_id->departments as $p) {
            $p->department;
            $departmentName = $p->department;
        }
        // echo"<pre>";
        // print_r($departmentName);
        // die;



        // echo "<pre>";
        // print_r($request->all());
        // if ($request['dept'] == 'water') {
        //     $dept_id = 1;
        // } elseif ($request['dept'] == 'electricity') {
        //     $dept_id = 2;
        // } elseif ($request['dept'] == 'disaster') {
        //     $dept_id = 3;
        // }

        $complain = new Complain;
        $complain->customer_id = $cid;
        $complain->name = $request['name'];
        $complain->email = $request['email'];
        $complain->mob = $request['mob'];
        $complain->address = $request['address'];
        $complain->city = $request['city'];
        $complain->state = $request['state'];
        $complain->zip = $request['zip'];
        $complain->pt = $prt;
        $complain->opt = $request['opt'];
        // $complain->dept = $departmentName;
        $complain->department_id = $department_id['department'];
        $complain->pd = $request['pd'];
        $complain->save();

        foreach ($request->file('file') as $imagefile) {

            $random = Str::random(7);
            $fileName = time() . "-ocrs-" . "-" . $random . "-" . date('d-m-y') . "." . $imagefile->getClientOriginalExtension();
            $fileloc = $imagefile->storeAs('public/uploads', $fileName);

            // $complain->file = $fileloc;
            // $complain->save();
            $image = new Image;
            $image->complain_id = $complain->complain_id;
            $image->url = $fileloc;
            $image->save();
        }
        notify()->success('Complain registered successfully.');
        // $data = compact('prt');
        return redirect('/login/dash/view')->with('success', 'Complain registered successfully.');
        // return view('dash',compact('prt'));
    }
}
