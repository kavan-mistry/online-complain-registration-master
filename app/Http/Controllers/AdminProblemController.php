<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\Problem_types;
use Illuminate\Http\Request;

class AdminProblemController extends Controller
{
    
    public function problem_list_view(){

        $problem_types = Problem_types::with('departments')->get();
        
        $departments  = department::get();

        // echo "<pre>";
        // echo($problem_types);
        // echo "</pre>";
        // die;
        $data = compact('problem_types', 'departments');
        return view('problemList')->with($data);

    }

    public function problem_list_add(Request $request){

        // echo "<pre>";
        // print_r($request->all());
        // die;

        $request->validate(
            [
                'problem_type' => 'required',
                'department' => 'required'
            ]
        );

        $problem_types = new Problem_types;
        $problem_types->problems = $request['problem_type'];
        $problem_types->department = $request['department'];
        $problem_types->save();

        smilify('success', 'New Problem entered successfully !');
        // connectify('success', 'Problem Entered', 'New Problem entered successfully !');
        return redirect('/adlogin/addash/problem_list');

    }

    public function problem_list_edit(Request $request, $id){

        $request->validate(
            [
                'problem_type' => 'required',
                'department' => 'required'
            ]
        );

        $problem_types = Problem_types::find($id);

        $problem_types->problems = $request['problem_type'];
        $problem_types->department = $request['department'];
        $problem_types->save();

        smilify('success', 'Problem edited successfully !');
        return redirect('/adlogin/addash/problem_list');

    }

    public function admin_department_delete($id){

        $problem_data = Problem_types::find($id);

        if(!is_null($problem_data)){
            $problem_data->delete();
        }

        smilify('success', 'Problem deleted successfully.');
        // connectify('success', 'Problem Deleted', 'Problem Deleted successfully !');
        return redirect()->back();
    }

}
