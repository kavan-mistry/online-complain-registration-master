<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\Complain;
use App\Models\dept_images;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $department = session()->get('department');
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
        $complain1 = Complain::where('complain_id', $id)->first();
        $images = Image::where('complain_id', $id)->get();
        $dept_images = dept_images::where('complain_id', $id)->get();
        if (is_null($complain)) {
            $url = url('/deptlogin/deptdash') . "/" . $de;
            return redirect($url, $de);
        } elseif ($de == $complain1['dept']) {
            $url = url('/deptlogin/deptdash') . "/" . $de . "/update" . "/" . $id;
            // $url = url('/deptlogin/deptdash/{de}/update/{id}') ."/". $id;
            // echo $url;
            $data = compact('complain', 'url', 'de', 'id', 'images', 'dept_images');
            // echo "<pre>";
            // print_r($data);
            return view('deptEditComplain')->with($data, $url, $de);
        } else {
            smilify('error', 'Complaint not exist.');
            return redirect()->back();
        }
    }

    public function deptupdate($id, Request $request, $de)
    {
        $complain1 = Complain::where('complain_id', $de)->value('pt');
        $comp_str = $complain1 . " : edited successfully";
        // echo $de;
        // die($comp_str);

        $status = $request['status'];
        session()->put('status', $status);

        if ($status == 3) {
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

            $complain = Complain::find($de);
            $complain->status = $request['status'];
            $complain->rejection_reason = $request['rejection_reason'];
            $complain->save();
            // echo "<pre>";
            // print_r($complain);
            // session()->flash('message', 'Edited successfully.');
            foreach ($request->file('update_file') as $imagefile) {

                $random = Str::random(7);
                $fileName = time() . "-ocrs-work-proof-" . "-" . $random . "-" . date('d-m-y') . "." . $imagefile->getClientOriginalExtension();
                $fileloc = $imagefile->storeAs('public/uploads/update/', $fileName);

                $dept_image = new dept_images;
                $dept_image->complain_id = $complain->complain_id;
                $dept_image->url = $fileloc;
                $dept_image->save();
            }

            notify()->success($comp_str);
            $url = url('/deptlogin/deptdash');
            return redirect($url);
        } else {
            $complain = Complain::find($de);
            $complain->status = $request['status'];
            $complain->rejection_reason = $request['rejection_reason'];
            $complain->save();
            notify()->success($comp_str);
            $url = url('/deptlogin/deptdash');
            return redirect($url);
        }
    }
}
