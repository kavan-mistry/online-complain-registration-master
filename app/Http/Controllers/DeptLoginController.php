<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\Complain;
use App\Models\dept_images;
use App\Models\Image;
use App\Models\Notices;
use App\Models\Reopen_complain;
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
        $department_id = department::where('department', $department)->value('department_id');
        $notices = Notices::get();
        // if(!is_null($de, $request)){
        $complaints = Complain::where('department_id', $department_id)->get();

        $search = $request['search'] ?? "";
        // echo $search;
        // echo $de;
        // $dept = $request['dept'];
        if ($search != "") {
            // echo 'this one';
            $complaints = Complain::where([
                ['name', 'LIKE', "%$search%"],
                ['department_id', '=', "$department_id"]
            ])->orWhere([
                ['pt', 'LIKE', "%$search%"],
                ['department_id', '=', "$department_id"]
            ])->get();
            // $complain = Complain::sortable()->where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->paginate(6);
        } else {
            $complaints = Complain::where('department_id', $department_id)->get();
            // echo 'not this';
        }

        $data = compact('complaints', 'department', 'department_id', 'search', 'notices');
        return view('deptDash')->with($data, $department);
        // }
    }

    public function deptedit($de, $id)
    {
        $complain = Complain::find($id);
        $reopen_complain = Reopen_complain::where('complain_id', $id)->first();
        $complain1 = Complain::where('complain_id', $id)->first();
        $images = Image::where([
            ['complain_id', $id],
            ['reopen_id', '=', 0]
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
        $dept_name = department::where('department_id', $de)->value('department');
        // echo $complain1['department_id'];
        // echo "<br>";
        // echo $dept_name;

        if (is_null($complain)) {
            $url = url('/deptlogin/deptdash') . "/" . $de;
            return redirect()->back();
        } elseif ($de == $complain1['department_id']) {
            $url = url('/deptlogin/deptdash') . "/" . $de . "/update" . "/" . $id;
            // $url = url('/deptlogin/deptdash/{de}/update/{id}') ."/". $id;
            // echo $url;
            $data = compact('complain', 'url', 'de', 'id', 'images', 'dept_images', 'dept_name', 'reopen_complain', 'reopen_images', 'dept_reopen_images');
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
        $reopen_id = Reopen_complain::where('complain_id', $de)->value('reopen_id');

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
                if (isset($reopen_id)) {
                    $dept_image->reopen_id = $reopen_id;
                }
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
