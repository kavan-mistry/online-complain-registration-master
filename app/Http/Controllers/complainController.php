<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;

class complainController extends Controller
{

    public function customer()
    {
        return $this->belongsTo(customers::class);
    }

    public function complain(Request $request, $data)
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
                'pt' => 'required|not_in:0',
                'dept' => 'required|not_in:0',
                'pd' => 'required',
                'file' => 'required|image|mimes:jpeg,png,jpg'
            ]
        );


        $fileName = time() . "-ocrs-" . date('d-m-y') . "." . $request->file('file')->getClientOriginalExtension();
        // echo $request->file('file')->storeAs('public/uploads', $fileName);
        $fileloc = $request->file('file')->storeAs('public/uploads', $fileName);

        // echo "<pre>";
        // print_r($request->all());
        if ($request['dept'] == 'water') {
            $dept_id = 1;
        } elseif ($request['dept'] == 'electricity') {
            $dept_id = 2;
        } elseif ($request['dept'] == 'disaster') {
            $dept_id = 3;
        }

        $complain = new Complain;
        $complain->customer_id = $data;
        $complain->name = $request['name'];
        $complain->email = $request['email'];
        $complain->mob = $request['mob'];
        $complain->address = $request['address'];
        $complain->city = $request['city'];
        $complain->state = $request['state'];
        $complain->zip = $request['zip'];
        $complain->pt = $request['pt'];
        $complain->dept = $request['dept'];
        $complain->department_id = $dept_id;
        $complain->pd = $request['pd'];
        $complain->file = $fileloc;
        $complain->save();

        return redirect()->back()->with('success', 'Complain registered successfully.');
    }
}
