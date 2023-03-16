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
                'passward' => 'required',
            ]
        );

        $user = department::where('email', $request->input('email'))->get();

        // echo "<pre>";
        // print_r($user);

        if (empty($user->all())) {
            return redirect('/deptlogin')->withError('Invalid email or password');
        } elseif ($user[0]->passward == $request->input('passward')) {
            session()->put('dept_id', 1);
            // return redirect('/deptlogin/deptdash');
        } else {
            return redirect('/deptlogin')->withError('Invalid email or password');
        }
    }

    public function viewdash(Request $request, $de)
    {

        // if(!is_null($de, $request)){
        $complaints = Complain::where('dept', $de)->sortable()->paginate(5);

        $search = $request['search'] ?? "";
        // echo $search;
        // echo $de;
        // $dept = $request['dept'];
        if ($search != "") {
            // echo 'this one';
            $complaints = Complain::sortable()->where([
                ['name', 'LIKE', "%$search%"],
                ['dept', '=', "$de"]
            ])->orWhere([
                ['email', 'LIKE', "%$search%"],
                ['dept', '=', "$de"]
                ])->paginate(5);
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
            $complaints = Complain::where('dept', $de)->sortable()->paginate(5);
            // echo 'not this';
        }

        $data = compact('complaints', 'de', 'search');
        return view('deptDash')->with($data, $de);
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

        // print_r($request['update_file']);
        // die;
        if (isset($request['update_file'])) {

            $fileName = time() . "-ocrs-" . date('d-m-y') . "." . $request->file('update_file')->getClientOriginalExtension();
            $fileloc = $request->file('update_file')->storeAs('public/uploads/update', $fileName);
            $complain = Complain::find($de);
            $complain->status = $request['status'];
            $complain->file_update = $fileloc;
            $complain->save();
            // echo "<pre>";
            // print_r($complain);
            $url = url('/deptlogin/deptdash') . "/" . $id;
            return redirect($url);
        } else {
            $complain = Complain::find($de);
            $complain->status = $request['status'];
            $complain->save();
            $url = url('/deptlogin/deptdash') . "/" . $id;
            return redirect($url);
        }
    }
}
