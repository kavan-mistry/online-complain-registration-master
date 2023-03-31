<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;

class AdminDepartmentController extends Controller
{
    
    public function admin_department_view(){

        $department_data = department::get();

        $data = compact('department_data');

        return view('AdminDepartment')->with($data);
    }

    public function admin_department_add(Request $request){

        // echo "<pre>";
        // print_r($request->all());
        $request->validate(
            [
                'department_name' => 'required',
                'department_email' => 'email|required',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ]
        );

        $department_data = new department;
        $department_data->department = $request['department_name'];
        $department_data->email = $request['department_email'];
        $department_data->password = $request['password'];
        $department_data->save();

        return redirect()->back()->with('success', 'Department added successfully');
    }

    public function admin_department_delete($id){

        $department_data = department::find($id);

        if(!is_null($department_data)){
            $department_data->delete();
        }

        return redirect()->back()->with('success', 'Department deleted successfully.');

    }

}
