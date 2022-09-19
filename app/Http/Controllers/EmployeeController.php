<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function home()
    {
        return view('dashboard');
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:6',
            'phone' => 'required|unique:employees|min:11|max:13',
            'email' => 'required|email|unique:employees',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'salary' => 'required|integer|between:5000,50000',
        ]);
        $employee= $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $employee['image'] = $destinationPath . $profileImage;
        }
        $employee = Employee::create($employee);
        return redirect()->route('employee.index');
    }

    public function index()
    {
        $data=[
            'employees'=>Employee::all()
        ];
        return view('employee.index',$data);
    }

    public function edit($id)
    {
        $data=[
            'employees'=>Employee::find($id)
        ];
        return view('employee.update',$data);
    }

    public function update(Request $request,$id)
    {


        $request->validate([
            'name' => 'required|string|min:6',
            'phone' => 'required|min:11|max:13|unique:employees,phone,'.$id,
            'email' => 'required|email|unique:employees,email,'.$id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'salary' => 'required|integer|between:5000,50000',
        ]);

        $data= Employee::find($id);

        $employees= $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $employees['image'] = $destinationPath . $profileImage;
        }

        $data->update($employees);
        return redirect()->route('employee.index');
    }

    public function profile($id)
    {
        $data=[
            'employees'=>Employee::find($id)
        ];
        return view('employee.profile',$data);
    }

    public function destroy($id)
    {
        $employee= Employee::find($id);
        Employee::destroy($id);
        return back();
    }



}
