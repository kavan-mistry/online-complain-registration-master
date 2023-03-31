<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\Image;
use Illuminate\Contracts\Session\Session;

class viewDetailsController extends Controller
{

    public function detailView($comp_id){
        // echo "<pre>";
        // print_r($cid);
        // echo "complain id :";
        // print_r($comp_id);
        $user = session()->get('user');
        
        $cid = Session()->get('cid');
        $complain_id = $comp_id;
        $complain = Complain::where('complain_id', $complain_id)->get();
        $images = Image::where('complain_id', $complain_id)->get();
        $data = compact('complain' ,'cid', 'user', 'images');
        // echo "<pre>";
        // print_r($data);
        return view('viewDetails')->with($data);
    }

}
