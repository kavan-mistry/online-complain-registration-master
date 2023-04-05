<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDepartmentController extends Controller
{

    public function admin_department_view()
    {

        $department_data = department::get();

        $data = compact('department_data');

        return view('AdminDepartment')->with($data);
    }

    public function admin_department_add(Request $request)
    {

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

        $hashPass = Hash::make($request['password']);

        $department_data = new department;
        $department_data->department = $request['department_name'];
        $department_data->email = $request['department_email'];
        $department_data->password = $hashPass;
        $department_data->save();

        notify()->success('Department added successfully');
        return redirect()->back();
    }

    public function admin_department_edit(Request $request, $id)
    {

        // echo "<pre>";
        // print_r($request->all());

        $department = department::where('department_id', $id)->first();

        if ($request['password'] == null) {

            $request->validate(
                [
                    'department_name' => 'required',
                    'department_email' => 'email|required',
                ]
            );

            $department->department = $request['department_name'];
            $department->email = $request['department_email'];
            $department->save();

            smilify('success', 'Department edited successfully !');
            return redirect('/adlogin/addash/department');

        } else {

            $request->validate(
                [
                    'department_name' => 'required',
                    'department_email' => 'email|required',
                    'password' => 'required|confirmed',
                    'password_confirmation' => 'required'
                ]
            );

            $hashPass = Hash::make($request['password']);

            $department->department = $request['department_name'];
            $department->email = $request['department_email'];
            $department->password = $hashPass;
            $department->save();

            smilify('success', 'Department edited successfully !');
            return redirect('/adlogin/addash/department');
            
        }
    }

    public function admin_department_delete($id)
    {

        $department_data = department::find($id);

        if (!is_null($department_data)) {
            $department_data->delete();
        }

        notify()->success('Department Deleted successfully');
        return redirect()->back();
    }
}
