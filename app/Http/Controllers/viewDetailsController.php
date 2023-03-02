<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complain;

class viewDetailsController extends Controller
{

    public function detailView($cid, $comp_id){
        // echo "<pre>";
        // print_r($cid);
        // echo "complain id :";
        // print_r($comp_id);
        $complain_id = $comp_id;
        $complain = Complain::where('complain_id', $complain_id)->get();
        $data = compact('complain');
        // echo "<pre>";
        // print_r($data);
        return view('viewDetails')->with($data);
    }

}
