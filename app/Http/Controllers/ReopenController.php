<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\Reopen_complain;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Image;

class ReopenController extends Controller
{
    public function addReopen(Request $request, $id)
    {

        $request->validate(
            [
                'feedback' => 'required|max:500',
                'file' => 'required|max:5',
            ]
        );

        // echo "<pre>";
        // print_r($request['file']);
        // echo $id;
        // die;
        $reopen_complain = Reopen_complain::get();
        $complain = Complain::where('complain_id', $id)->first();

        $reopen_complain = new Reopen_complain;
        $reopen_complain->complain_id  = $id;
        $reopen_complain->feedback = $request['feedback'];
        $complain->status = 4;
        $reopen_complain->save();
        $complain->save();


        if (!empty($request['file']) && count($request['file']) > 0) {
            foreach ($request['file'] as $imagefile) {
          
                $random = Str::random(7);
                $fileName = time() . "-ocrs-" . "-" . $random . "-" . date('d-m-y') . "." . $imagefile->getClientOriginalExtension();
                $fileloc = $imagefile->storeAs('public/uploads', $fileName);

                // $complain->file = $fileloc;
                // $complain->save();
          
                $image = new Image;
                $image->complain_id = $complain->complain_id;
                $image->reopen_id = $reopen_complain->reopen_id;
                $image->url = $fileloc;
                $image->save();
            }
        }
      

        smilify('success', 'Complain Reopened successfully !');
        return redirect()->back();
    }
}
