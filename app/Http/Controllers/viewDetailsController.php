<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\dept_images;
use App\Models\Image;
use Illuminate\Contracts\Session\Session;

class viewDetailsController extends Controller
{
    
    public function detailView($comp_id){

        $customer_id = session()->get('cid');
        // echo "<pre>";
        // print_r($cid);
        // echo "complain id :";
        // print_r($comp_id);
        $user = session()->get('user');
        
        $cid = Session()->get('cid');
        $complain_id = $comp_id;
        $complain = Complain::where('complain_id', $complain_id)->get();
        $complain1 = Complain::where('complain_id', $complain_id)->first();
        $images = Image::where('complain_id', $complain_id)->get();
        $dept_images = dept_images::where('complain_id', $complain_id)->get();
        $data = compact('complain' ,'cid', 'user', 'images', 'dept_images');
        // echo "<pre>";
        // print_r($data);
        if ($customer_id == $complain1['customer_id']){
            return view('viewDetails')->with($data);
        }
        else{
            smilify('error', 'Complaint not exist.');
            return redirect()->back();
        }
    }

}
