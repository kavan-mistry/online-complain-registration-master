<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complain;
use Illuminate\Contracts\Session\Session;

class viewDetailsController extends Controller
{

    public function detailView($comp_id){
        // echo "<pre>";
        // print_r($cid);
        // echo "complain id :";
        // print_r($comp_id);
        $cid = Session()->get('cid');
        $complain_id = $comp_id;
        $complain = Complain::where('complain_id', $complain_id)->get();
        $data = compact('complain' ,'cid');
        // echo "<pre>";
        // print_r($data);
        return view('viewDetails')->with($data , $cid);
    }

}
