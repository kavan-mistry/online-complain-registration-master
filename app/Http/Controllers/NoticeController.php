<?php

namespace App\Http\Controllers;

use App\Models\Notices;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function viewNotice()
    {

        $notices = Notices::get();

        $data = compact('notices');
        return view('adminNotice')->with($data);
    }


    public function addNotice(Request $request)
    {
        $request->validate(
            [
                'notice' => 'required|max:255',
            ]
        );

        echo "<pre>";
        print_r($request->all());

        $notices = Notices::get();

        $notices = new Notices;
        $notices->notice = $request['notice'];
        $notices->save();

        smilify('success', 'New Notice entered successfully !');
        return redirect()->back();
    }

    public function deleteNotice($id){
        $notices = Notices::find($id);

        if (!is_null($notices)) {
            $notices->delete();
        }

        notify()->success('Notice Deleted successfully');
        return redirect()->back();
    }
}
