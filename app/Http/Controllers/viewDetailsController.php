<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\department;
use App\Models\dept_images;
use App\Models\Image;
use App\Models\Reopen_complain;
use Illuminate\Contracts\Session\Session;

class viewDetailsController extends Controller
{

    public function detailView($comp_id)
    {

        $customer_id = session()->get('cid');
        // print_r($cid);
        // echo "complain id :";
        // print_r($comp_id);
        $user = session()->get('user');

        $cid = Session()->get('cid');
        $complain_id = $comp_id;
        $complain = Complain::where('complain_id', $complain_id)->get();
        $reopen_complain = Reopen_complain::where('complain_id', $complain_id)->get();
        $complain1 = Complain::where('complain_id', $complain_id)->first();
        $images = Image::where([
            ['complain_id', $complain_id],
            ['reopen_id', 0]
        ])->get();
        $reopen_images = Image::where([
            ['complain_id', $complain_id],
            ['reopen_id', '!=', 0]
        ])->get();
        $dept_images = dept_images::where([
            ['complain_id', $complain_id],
            ['reopen_id', '!=', 0]
        ])->get();
        $dept_reopen_images = dept_images::where([
            ['complain_id', $complain_id],
            ['reopen_id',  0]
        ])->get();
        // echo $images;
        // echo "<pre>";
        // print_r($dept_images);
        // die;
        $dept_name = department::where('department_id', $complain1['department_id'])->value('department');
        $data = compact('complain', 'reopen_complain', 'cid', 'user', 'images', 'dept_images', 'dept_name', 'reopen_images', 'dept_reopen_images');
        // echo "<pre>";
        // print_r($data);
        if ($customer_id == $complain1['customer_id']) {
            return view('viewDetails')->with($data);
        } else {
            smilify('error', 'Complaint not exist.');
            return redirect()->back();
        }
    }
}
