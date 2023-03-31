<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\Complain;
use Illuminate\Http\Request;

class DeptLoginController extends Controller
{

    

    public function index()
    {
        return view('deptlogin');
    }

    public function deptlogin(Request $request)
    {
        $request->validate(
            [
                'email' => 'email|required',
                'password' => 'required',
            ]
        );

        $user = department::where('email', $request->input('email'))->get();

        // echo "<pre>";
        // print_r($user);

        return redirect('/deptlogin/deptdash');
    }

    public function viewdash(Request $request)
    {
        $department= session()->get('department');
        // if(!is_null($de, $request)){
        $complaints = Complain::where('dept', $department)->get();

        $search = $request['search'] ?? "";
        // echo $search;
        // echo $de;
        // $dept = $request['dept'];
        if ($search != "") {
            // echo 'this one';
            $complaints = Complain::where([
                ['name', 'LIKE', "%$search%"],
                ['dept', '=', "$department"]
            ])->orWhere([
                ['email', 'LIKE', "%$search%"],
                ['dept', '=', "$department"]
                ])->get();
            // $complain = Complain::sortable()->where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->paginate(6);
        }
        // elseif ($dept != "") {
        //     $complain = Complain::sortable()->where('dept', '=', "$dept")->paginate(5);
        // }
        // elseif($dept == "" && $search == ""){
        //     $complain = Complain::sortable()->paginate(6);
        // }
        // elseif ($search != "") {
        //     $complain = Complain::sortable()->where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->paginate(5);
        //     // $complain = Complain::sortable()->where('name', 'LIKE', "%$search%")->when($search, function ($search, $dept) {
        //     //     return $search->where('dept', $dept);
        //     // })->paginate(6);
        //     // $complain = Complain::sortable()->where([
        //     //     ['name', 'LIKE', "%$search%"],
        //     //     ['dept', '=', "$dept"]
        //     // ])->paginate(6);
        // } 
        else {
            $complaints = Complain::where('dept', $department)->get();
            // echo 'not this';
        }

        $data = compact('complaints', 'department', 'search');
        return view('deptDash')->with($data, $department);
        // }
    }

    public function deptedit($de, $id)
    {
        $complain = Complain::find($id);
        if (is_null($complain)) {
            $url = url('/deptlogin/deptdash') . "/" . $de;
            return redirect($url, $de);
        } else {
            $url = url('/deptlogin/deptdash') . "/" . $de . "/update" . "/" . $id;
            // $url = url('/deptlogin/deptdash/{de}/update/{id}') ."/". $id;
            // echo $url;
            $data = compact('complain', 'url', 'de', 'id');
            // echo "<pre>";
            // print_r($data);
            return view('deptEditComplain')->with($data, $url, $de);
        }
    }

    public function deptupdate($id, Request $request, $de)
    {

        $status = $request['status'];
        session()->put('status', $status);
        
        if($status == 3){
            $request->validate(
                [
                    'rejection_reason' => 'required',
                ]
            );
            // return redirect()->back();
        }

        // print_r($request['update_file']);
        // die;
        if (isset($request['update_file'])) {

            $fileName = time() . "-ocrs-" . date('d-m-y') . "." . $request->file('update_file')->getClientOriginalExtension();
            $fileloc = $request->file('update_file')->storeAs('public/uploads/update', $fileName);
            $complain = Complain::find($de);
            $complain->status = $request['status'];
            $complain->rejection_reason = $request['rejection_reason'];
            $complain->file_update = $fileloc;
            $complain->save();
            // echo "<pre>";
            // print_r($complain);
            session()->flash('message', 'Edited successfully.');
            $url = url('/deptlogin/deptdash') ;
            return redirect($url);
        } else {
            $complain = Complain::find($de);
            $complain->status = $request['status'];
            $complain->rejection_reason = $request['rejection_reason'];
            $complain->save();
            session()->flash('message', 'Edited successfully.');
            $url = url('/deptlogin/deptdash') ;
            return redirect($url);
        }
    }
}
